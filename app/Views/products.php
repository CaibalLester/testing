<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <form action="/add" method="post">
                <td>
                    <input type="hidden" name="id">
                </td>
        <h1>Create Product</h1>
                <td>
                    <label>code</label>
                    <input type="text" name="code" placeholder="code">
                </td>
                <td>
                    <label>name</label>
                    <input type="text" name="name" placeholder="name" >
                </td>
                <td>
                    <label>quantity</label>
                    <input type="text" name="quantity" placeholder="quantity">
                </td>
                <td>
                    <input type="submit" value="Create">
                </td>
            </form>
        </tr>
    </table>


<?php if (isset($pro)): ?>
    <table>
        <tr>
            <form action="/save" method="post">
                <td>
                    <input type="hidden" name="id" value="<?= $pro['id'] ?>">
                </td>
        <h1>Update Product</h1>
                <td>
                    <label>code</label>
                    <input type="text" name="code" placeholder="code" value="<?= $pro['code'] ?>">
                </td>
                <td>
                    <label>name</label>
                    <input type="text" name="name" placeholder="name" value="<?= $pro['name'] ?>">
                </td>
                <td>
                    <label>quantity</label>
                    <input type="text" name="quantity" placeholder="quantity" value="<?= $pro['quantity'] ?>">
                </td>
                <td>
                    <input type="submit" value="Update">
                </td>
            </form>
<?php endif; ?>
        </tr>
    </table>

    <h1>Product listing</h1>
    <table border="1">
        <tr>
            <th>code</th>
            <th>name</th>
            <th>quantity</th>
            <th>action</th>
        </tr>
        <?php foreach($product as $pr): ?>
            <tr>
                <td><?= $pr['code'] ?></td>
                <td><?= $pr['name'] ?></td>
                <td><?= $pr['quantity'] ?></td>
                <td><a href="/delete/<?= $pr['id'] ?>">Delete</a>|| <a href="/edit/<?= $pr['id'] ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
