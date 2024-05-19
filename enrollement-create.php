<?php
require_once("./schooldb_conn.php");
?>
<?php require_once('./template/slidebar.php') ?>
<?php require_once('./template/header.php') ?>


<hr>

<section class=" max-w-[1000px] mx-auto bg-gray-100">
      <ol class="flex items-center whitespace-nowrap">
            <li class="inline-flex items-center">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                        Create Enrollements
                  </a>

            </li>


      </ol>
      <h1 class=" text-center font-serif font-bold text-3xl bg-fuchsia-200 p-2">Create Enrollement</h1>
      <?php 
      $studentId = $_GET['row_id'];
      $studentSql= "SELECT * FROM students WHERE id = $studentId";
      $studentQuery = mysqli_query($conn,$studentSql);
      $studentResult = mysqli_fetch_assoc($studentQuery);
      ?>
      <p class=" my-3  "><?=$studentResult['name']  ?> enrolls to</p>
      <form action="./enrollement-save.php" method="post" class=" bg-gray-200">
            <input type="hidden"name="studentId" value="<?=  $studentId ?>">
            <select class=" mt-3 py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="batchId">
                  <option selected="">Choose Batch</option>
                  <?php
                  $sql = "SELECT * FROM batches";
                  $query = mysqli_query($conn, $sql);

                  ?>
                  <?php while ($option = mysqli_fetch_assoc($query)) : ?>
                        <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>

                  <?php endwhile ?>
            </select>

            <button type="submit" class=" mt-3 w-full text-center py-3 px-4  gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Enroll Now 
            </button>


      </form>
      
</section>



<?php require_once('./template/footer.php') ?>