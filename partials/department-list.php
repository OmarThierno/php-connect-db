<div class="d-flex justify-content-between align-items-center mt-3 mb-4 pb-3 border-bottom">
  <h2 class="">List of departments</h2>
    <?php if (!empty($_SESSION["user_id"]) && !empty($_SESSION["name"])) { ?>
      <div class="me-3"><strong>Welcome</strong> <?php echo $_SESSION ["name"] ?>!</div>
    <?php } ?>
</div>
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
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } else { ?>
  <h3>Non ci sono risultati</h3>
<?php } ?>