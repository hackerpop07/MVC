<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <form action="index.php?page=update&id=<?php echo $product->id  ?>" method="post">


                <div class="form-group">
                    <label class="form-group">inputname</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $product->name  ?>">
                </div>

                <div class="form-group">
                    <label class="form-group">price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $product->price  ?>">
                </div>

                <div class="form-group">
                    <label class="form-group">qty</label>
                    <input type="text" class="form-control" name="qty" value="<?php echo $product->qty  ?>">
                </div>

                <div class="form-group">
                    <label class="form-group">description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $product->description  ?>">
                </div>

                <div>
                    <button type="submit" class="btn-outline-success">UPDATE</button>
                </div>
            </form>
        </div>

    </div>

</div>
</body>
</html>