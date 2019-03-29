<?php
    require('Model/database.php');
    function get_foodc(){
        global $db;
        $query = 'SELECT * FROM foodcategory ORDER BY foodCategoryID';
        $statement = $db->prepare($query);
        $statement -> execute();
        $categories = $statement->fetchAll();
        $statement -> closeCursor();

        return $categories;
    }

    $categories_id = filter_input(INPUT_GET,'category_id',FILTER_VALIDATE_INT);

    if($categories_id == null || $categories_id == false){
        $categories_id = 1;
        $foods= get_food_by_c($categories_id);
    }else{
        $foods= get_food_by_c($categories_id);
    }

    function get_food_by_c($categories_id){
        global $db;
        $query = 'SELECT * FROM food WHERE foodCategoryID = :foodCategoryID';
        $statement = $db -> prepare($query);
        $statement -> bindValue(':foodCategoryID',$categories_id);
        $statement -> execute();
        $foods = $statement -> fetchAll();
        $statement -> closeCursor();
        return $foods;
    }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="food.php" method="get">
       <?php foreach ( get_foodc() as $value) : ?>
               <a href="?category_id=<?php echo $value[0] ?>"><?php echo $value[1]?></a>
               <input type="hidden" name="category_id" value="<?php echo $value[0]?>">
       <?php endforeach ?>
     </form>
     <?php foreach (get_food_by_c($categories_id) as $value) : ?>
             <?php echo $value[1] ?>
     <?php endforeach ?>

   </body>
 </html>
