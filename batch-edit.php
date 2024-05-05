<?php
require_once("./schooldb_conn.php");
?>
<?php require_once('./template/slidebar.php') ?>
<?php require_once('./template/header.php') ?>


<hr>

<section class=" max-w-[1000px] mx-auto bg-gray-100">
      <ol class="flex items-center whitespace-nowrap">
            <li class="inline-flex items-center">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="./batch-create.php">
                        Manage Batches
                  </a>
                  <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                  </svg>

            </li>
            <li class="inline-flex items-center">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="./batch-edit.php">
                        Edit Batch
                  </a>
                  <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                  </svg>

            </li>


      </ol>
      <h1 class=" text-center font-serif font-bold text-3xl bg-fuchsia-200 p-2">Edit Batch</h1>
      <?php

      $id = $_GET['row_id'];

      $sql = "SELECT *, batches.id AS batch_id FROM batches LEFT JOIN courses ON courses.id = batches.course_id WHERE batches.id = $id";
   
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      ?>
      <form action="./batch-update.php" method="post" class=" bg-gray-200">
            <div class=" grid grid-cols-2 gap-3  p-3">
                  <input type="hidden" name="id" value="<?=$row['batch_id']?>">
                  <div class=" col-span-1">
                        <input type="text" value="<?= $row['name'] ?>" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Batch Name">

                  </div>
                  <div class=" col-span-1">
                        <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="courseId">
                              <?php
                              $sqll = "SELECT * FROM courses";
                              $query = mysqli_query($conn, $sqll);

                              ?>
                              <?php while ($option = mysqli_fetch_assoc($query)) : ?>
                                    <option value="<?= $option['id']?>" <?= $row['course_id'] == $option['id'] ? 'selected' : '' ?> > <?= $option['title'] ?></option>

                              <?php endwhile ?>
                        </select>

                  </div>
                  <div class=" col-span-1">
                        <input type="date" value="<?= $row['start_date'] ?>" name="date" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                  </div>
                  <div class=" col-span-1">
                        <input type="time"  value="<?= $row['start_time'] ?>" name="time" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">

                  </div>
                  <div class=" col-span-2">
                        <input type="number"  value="<?= $row['student_limit'] ?>" name="limit" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="student limit">

                  </div>
                  <div class="py-5">
                        <div class="flex">
                              <input type="checkbox" name="is_register_open" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-default-checkbox" value="1" checked>
                              <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-gray-400">
                                    Register Open
                              </label>
                        </div>
                  </div>


            </div>

            <button type="submit" class=" mt-3 w-full text-center py-3 px-4  gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Update Batch
            </button>


      </form>
    
</section>



<?php require_once('./template/footer.php') ?>

