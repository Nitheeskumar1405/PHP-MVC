<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? $title : 'Movie Review App'; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>
<body>
    <?php include 'app/views/partials/header.php'; ?>
    <div class="content">
        <?php include $content; ?>
    </div>
</body>
</html>
