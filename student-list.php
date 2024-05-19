<?php
require_once("./schooldb_conn.php");
?>
<?php require_once('./template/slidebar.php') ?>
<?php require_once('./template/header.php') ?>
<?php

$sql = "SELECT *,students.id as student_id from students LEFT JOIN gender ON gender.id = students.gender_id ";
$countSql = "SELECT COUNT(id) as total_student FROM students";
if (isset($_GET['q'])) {
      $q = $_GET['q'];
      $sql .= " WHERE name LIKE '%$q%'";
      $countSql .= " WHERE name LIKE '%$q%'";
}


$countQuery = mysqli_query($conn, $countSql);

$countRow = mysqli_fetch_assoc($countQuery);

$totalRecord = $countRow['total_student'];

//pagination process

$recordPerPage = 5;

$totalPage = ceil($totalRecord / $recordPerPage);

$currentPage = isset($_GET['page']) ? $_GET['page']  : 1;

$offset = ($currentPage - 1) * $recordPerPage;


$sql .= " LIMIT $offset,$recordPerPage";


$result = mysqli_query($conn, $sql);

?>

<hr>

<section class=" max-w-[1000px] mx-auto bg-gray-100">
      <ol class="flex items-center whitespace-nowrap">
            <li class="inline-flex items-center">
                  <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                        Manage Students
                  </a>

            </li>


      </ol>

      <h1 class=" font-serif font-semibold text-center text-2xl text-decoration-underline ">Student Lists</h1>
      <div>
            <div class=" flex justify-between">
                  <a href="./student-create.php" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Create Student
                  </a>
                  <form action="./student-list.php" method="get">
                        <div>
                              <label for="hs-trailing-button-add-on-with-icon" class="sr-only">Label</label>
                              <div class="flex rounded-lg shadow-sm mt-3">
                                    <input type="text" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" placeholder="search name" id="hs-trailing-button-add-on-with-icon" name="hs-trailing-button-add-on-with-icon" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <button type="submit" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                          </svg>
                                    </button>
                              </div>
                        </div>
                  </form>
            </div>
            <h1 class=" my-3">Showing Result: <?= $totalRecord ?></h1>
            <?php if (isset($_GET['q'])) :  ?>
                  <div class=" mt-3 flex justify-end">
                        <p class=" mr-5">Search name by: <?= $q ?> </p>
                        <a href="./student-list.php">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:text-red-600 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                              </svg>
                        </a>

                  </div>
            <?php endif ?>

      </div>
      <div class="flex flex-col mt-3">
            <div class="m-1.5 overflow-x-auto">
                  <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                          <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Student Info</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Birthday</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Created At</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Updated At</th>

                                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php if ($totalRecord < 1) : ?>
                                                <tr>
                                                      <td colspan="5" class=" text-center">There is no student </td>
                                                </tr>
                                          <?php else : ?>

                                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                      <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $row['student_id'] ?></td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200 block">
                                                                  <div><?= $row['name'] ?></div>
                                                                  <div class=" mt-2 text-end inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-500 text-white"><?= $row['type'] ?></div>

                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y', strtotime($row['birthday'])) ?>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y', strtotime($row['created_at'])) ?></td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y', strtotime($row['updated_at'])) ?></td>

                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-end text-gray-800 dark:text-neutral-200">
                                                                  <div class="inline-flex rounded-lg shadow-sm">


                                                                        <a onclick="confirm('Are u sure wanna delete?')" href="./student-delete.php?row_id=<?= $row['id'] ?>" class=" hover:text-red-500 py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hover:text-red-700">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                              </svg>
                                                                        </a>
                                                                        <a href="./enrollement-create.php?row_id=<?= $row['id'] ?>" class=" hover:text-green-600  py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                              </svg>

                                                                        </a>



                                                                  </div>
                                                            </td>



                                                      </tr>
                                                <?php endwhile ?>
                                          <?php endif ?>




                                    </tbody>
                              </table>
                              <?php
                              $start = $currentPage > 3 ? $currentPage - 3 : 1;
                              $end = $currentPage + 3  < $totalPage ? $currentPage + 3 : $totalPage;

                              ?>
                              <!-- Pagination -->
                              <nav class="mt-3 flex items-center -space-x-px">
                                    <?php if ($currentPage - 1 > 0) : ?>
                                          <a href="./student-list.php?page=<?= $currentPage - 1 ?>&<?= isset($_GET['q']) ? 'q=' . $_GET['q'] : '' ?>" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                      <path d="m15 18-6-6 6-6" />
                                                </svg>
                                                <span aria-hidden="true" class="sr-only">Previous</span>
                                          </a>
                                    <?php endif ?>
                                    <div class="flex items-center gap-x-1">
                                          <!-- border bg-white border-gray-300 -->

                                          <?php for ($i = $start; $i <= $end; $i++) : ?>
                                                <a href="./student-list.php?page=<?= $i ?>&<?= isset($_GET['q']) ? 'q=' . $_GET['q'] : '' ?>" class=" <?= $i == $currentPage ? 'border bg-white border-gray-300' : '' ?> min-h-[38px] min-w-[38px] flex justify-center items-center  text-gray-800 py-2 px-3 text-sm rounded-lg focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:focus:bg-white/10" aria-current="page">
                                                      <?= $i ?>
                                                </a>
                                          <?php endfor; ?>

                                    </div>
                                    <?php if ($currentPage + 1 < $totalPage) : ?>
                                          <a href="./student-list.php?page=<?= $currentPage + 1 ?>&<?= isset($_GET['q']) ? 'q=' . $_GET['q'] : '' ?>" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:border-transparent dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                                                <span aria-hidden="true" class="sr-only">Next</span>
                                                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                      <path d="m9 18 6-6-6-6" />
                                                </svg>
                                          </a>
                                    <?php endif; ?>
                              </nav>
                              <!-- End Pagination -->
                        </div>
                  </div>
            </div>
      </div>
</section>



<?php require_once('./template/footer.php') ?>