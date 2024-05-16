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
                      Create Student
                  </a>

            </li>


      </ol>
      <h1 class=" text-center font-serif font-bold text-3xl bg-fuchsia-200 p-2">Create Student</h1>
      <form action="./student-save.php" method="post" class=" bg-gray-200">
            <div class=" grid grid-cols-3 gap-3  p-3">
                  <div class=" col-span-1">
                        <input type="text" name="studentName" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Student Name">

                  </div>
                  <div class=" col-span-1">
                        <input type="date" name="birthday" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="short">

                  </div>
                  <div class=" col-span-1">
                  <select class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="genderId">
                              <option selected="">Choose Gender</option>
                              <?php
                              $sqll = "SELECT * FROM gender";
                              $query = mysqli_query($conn, $sqll);

                              ?>
                              <?php while ($option = mysqli_fetch_assoc($query)) : ?>
                                    <option value="<?= $option['ID'] ?>"><?= $option['type'] ?></option>

                              <?php endwhile ?>
                        </select>
                  </div>

            </div>

            <button type="submit" class=" mt-3 w-full text-center py-3 px-4  gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                  Create Student
            </button>


      </form>
   
</section>



<?php require_once('./template/footer.php') ?>