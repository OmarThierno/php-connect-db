<h2>Lista di Dipartimenti</h2>
<?php if (count($departments) > 0) { ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">name</th>
        <th scope="col">address</th>
        <!-- <th scope="col">phone</th>
              <th scope="col">email</th>
              <th scope="col">website</th> -->
        <th scope="col">head of department</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($departments as $department) { ?>
        <tr>
          <th scope="row"><?php echo $department->getName() ?></th>
          <td><?= $department->getAddress() ?></td>
          <!-- <td><?= $department->getPhone() ?></td>
              <td><?= $department->getEmail() ?></td>
              <td><?= $department->getWebsite() ?></td> -->
          <td><?= $department->getHeadOfDepartment() ?></td>
          <td></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
  <h3>Non ci sono risultati</h3>
<?php } ?>