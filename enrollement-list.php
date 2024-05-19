<?php
require_once("./schooldb_conn.php");
?>
<?php require_once('./template/slidebar.php') ?>
<?php require_once('./template/header.php') ?>


<section>
      <h1 class=" font-serif font-semibold text-center text-2xl text-decoration-underline ">Enroll Lists</h1>
      <div class="flex flex-col mt-3">
            <div class="m-1.5 overflow-x-auto">
                  <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead>
                                          <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Id</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Student Name</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Batch Name</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Created_at</th>


                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                        

                                        $sql = "SELECT enrollments.id as enrollment_id,students.name as student_name, batches.name as batch_name, enrollments.created_at as enrollment_created_at FROM enrollments LEFT JOIN students ON enrollments.student_id = students.id LEFT JOIN batches ON enrollments.batch_id = batches.id";

                                          $result = mysqli_query($conn, $sql);
                                          ?>
                                          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">

                                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200"><?= $row['enrollment_id'] ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['student_name'] ?></td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= $row['batch_name'] ?>
                                                      </td>
                                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"><?= date('d-m-Y', strtotime($row['enrollment_created_at'])) ?></td>
                                                     



                                                </tr>
                                          <?php endwhile ?>


                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</section>

<?php require_once('./template/footer.php') ?>