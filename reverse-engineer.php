<?php
// reverse-engineer.php - Génère des entités (sans relations) avec repositoryClass
// Ignore les tables sans clé primaire
require_once 'vendor/autoload.php';

$dbHost = '127.0.0.1';
$dbName = 'kouldyeridb';
$dbUser = 'root';
$dbPass = '';
$dbPort = 3306;

$namespace = 'App\\Entity';
$outputDir = __DIR__ . '/src/Entity';

if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

try {
    $pdo = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connexion réussie à la base '$dbName'.\n";
} catch (PDOException $e) {
    die("❌ Connexion échouée : " . $e->getMessage() . "\n");
}

$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $table) {
    if (strpos($table, 'migration') !== false || strpos($table, 'doctrine') !== false) {
        echo "⏩ Table ignorée (migration) : $table\n";
        continue;
    }

    echo "🔍 Analyse de la table : $table\n";

    $stmtCol = $pdo->query("DESCRIBE `$table`");
    $columns = $stmtCol->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier la présence d'une clé primaire
    $primaryKey = null;
    foreach ($columns as $col) {
        if ($col['Key'] === 'PRI') {
            $primaryKey = $col['Field'];
            break;
        }
    }

    if (!$primaryKey) {
        echo "⚠️ Table '$table' ignorée (pas de clé primaire).\n";
        continue;
    }

    // Convertir le nom de la table en nom de classe (PascalCase)
    $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $table)));
    // Supprimer le 's' final si pluriel
    if (substr($className, -1) === 's' && substr($className, -2) !== 'ss') {
        $className = substr($className, 0, -1);
    }

    echo "🔨 Génération de l'entité : $className\n";

    $entityCode = "<?php\n\n";
    $entityCode .= "namespace $namespace;\n\n";
    $entityCode .= "use Doctrine\\ORM\\Mapping as ORM;\n\n";
    // Ajout du repositoryClass
    $entityCode .= "#[ORM\\Entity(repositoryClass: " . $className . "Repository::class)]\n";
    $entityCode .= "#[ORM\\Table(name: '$table')]\n";
    $entityCode .= "class $className\n";
    $entityCode .= "{\n";

    foreach ($columns as $column) {
        $fieldName = $column['Field'];
        $mysqlType = $column['Type'];
        $phpType = mapMySQLTypeToPhpType($mysqlType);
        $doctrineType = mapMySQLTypeToDoctrineType($mysqlType);
        $nullable = ($column['Null'] === 'YES') ? 'true' : 'false';

        $entityCode .= "    #[ORM\\";
        
        if ($fieldName === $primaryKey) {
            $entityCode .= "Id]\n    #[ORM\\GeneratedValue]\n    #[ORM\\Column(type: '$doctrineType')]\n";
        } else {
            // 🔽 Gestion spéciale pour les colonnes decimal (avec précision)
            if ($doctrineType === 'decimal') {
                // Extraire la précision et l'échelle du type MySQL (ex: decimal(10,2))
                if (preg_match('/decimal\((\d+),(\d+)\)/', $mysqlType, $matches)) {
                    $precision = $matches[1];
                    $scale = $matches[2];
                    $entityCode .= "Column(type: '$doctrineType', nullable: $nullable, precision: $precision, scale: $scale)]\n";
                } else {
                    // Valeurs par défaut si la précision n'est pas spécifiée
                    $entityCode .= "Column(type: '$doctrineType', nullable: $nullable, precision: 10, scale: 2)]\n";
                }
            } else {
                $entityCode .= "Column(type: '$doctrineType', nullable: $nullable)]\n";
            }
        }

        $entityCode .= "    private ?$phpType \$$fieldName = null;\n\n";

        // Getter
        $getterName = ($phpType === 'bool' && strpos($fieldName, 'is_') === 0) ? $fieldName : 'get' . ucfirst($fieldName);
        $entityCode .= "    public function $getterName(): ?$phpType\n";
        $entityCode .= "    {\n        return \$this->$fieldName;\n    }\n\n";

        // Setter
        $setterName = 'set' . ucfirst($fieldName);
        $entityCode .= "    public function $setterName(";
        if ($nullable) $entityCode .= "?";
        $entityCode .= "$phpType \$$fieldName): self\n";
        $entityCode .= "    {\n        \$this->$fieldName = \$$fieldName;\n        return \$this;\n    }\n\n";
    }

    $entityCode .= "}\n";

    $filePath = "$outputDir/$className.php";
    file_put_contents($filePath, $entityCode);
    echo "✅ Entité générée : $filePath\n";
}

echo "\n🎉 Génération terminée. Les tables sans clé primaire ont été ignorées.\n";
echo "Exécutez maintenant : php bin/console make:entity --regenerate\n";

// Fonctions de mapping CORRIGÉES
function mapMySQLTypeToPhpType($mysqlType) {
    if (strpos($mysqlType, 'tinyint(1)') !== false) return 'bool';
    if (strpos($mysqlType, 'int') !== false) return 'int';
    if (strpos($mysqlType, 'float') !== false || strpos($mysqlType, 'double') !== false) return 'float';
    if (strpos($mysqlType, 'decimal') !== false) return 'string';
    if (strpos($mysqlType, 'datetime') !== false || strpos($mysqlType, 'timestamp') !== false) return '\\DateTimeInterface';
    if (strpos($mysqlType, 'date') !== false) return '\\DateTimeInterface';
    return 'string';
}

function mapMySQLTypeToDoctrineType($mysqlType) {
    if (strpos($mysqlType, 'tinyint(1)') !== false) return 'boolean';
    if (strpos($mysqlType, 'int') !== false) return 'integer';
    if (strpos($mysqlType, 'float') !== false) return 'float';
    if (strpos($mysqlType, 'double') !== false) return 'float';
    if (strpos($mysqlType, 'decimal') !== false) return 'decimal';
    if (strpos($mysqlType, 'datetime') !== false || strpos($mysqlType, 'timestamp') !== false) return 'datetime';
    if (strpos($mysqlType, 'date') !== false) return 'date';
    if (strpos($mysqlType, 'time') !== false) return 'time';
    if (strpos($mysqlType, 'blob') !== false || strpos($mysqlType, 'binary') !== false) return 'blob';
    if (strpos($mysqlType, 'text') !== false) return 'text';
    return 'string';
}