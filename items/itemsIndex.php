<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Index Page</title>
    <link rel= "stylesheet" href ="style.css">
</head>
<body>
    <h1>Item List</h1>
    <form action="ItemsController.php" method="GET">
        <input type="text" name="search" placeholder="Search items">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><a href="updateItems.php?id=<?= $item['id'] ?>">
                        <?= $item['title'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</body>
</html>