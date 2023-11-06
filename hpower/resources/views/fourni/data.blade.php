<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>base de données con</title>
</head>
<body>
    <div>
    <?php
        use Illuminate\Support\Facades\DB;

        try {
            DB::connection()->getpdo();
            echo "Bien connecté à la base de données.";
        } catch (\Exception $e) {
            die("Impossible de se connecter à la base de données : " . $e->getMessage());
        }
        
    ?>

    </div>
</body>
</html>