
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">qty</th>
        <th scope="col">description</th>
        <th scope="col">action</th>
    </tr>

    </thead>
    <tbody>
    <?php
    if(count($products)==0):
    ?>
<tr>
    <p class="alert-danger">Product empty</p>
</tr>

        <?php
  else:
        ?>
      <?php
      foreach ($products as $key=>$product):
          ?>
          <tr>
              <th><?php echo ++$key ?></th>
              <td><?php echo $product->name ?></td>
              <td><?php echo $product->price ?></td>
              <td><?php echo $product->qty ?></td>
              <td><?php echo $product->description ?></td>
              <td>
                  <div>
                          <a href="index.php?page=edit&id=<?php echo $product->id ?>">
                              <button type="button" class="btn btn-outline-primary">update</button>
                          </a>

                          <a href="index.php?page=delete&id=<?php echo $product->id ?>">
                              <button type="button" class="btn btn-outline-primary">delete</button>
                          </a>
                  </div>
              </td>
          </tr>
      <?php
      endforeach;
      ?>
    <?php
    endif;
    ?>

    </tbody>
</table>
