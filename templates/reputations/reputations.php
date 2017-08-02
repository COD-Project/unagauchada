<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Límite Superior</th>
                <th>Límite Inferior</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i < count($this->reputations); $i++):
              $reputation = $this->reputations[$i];
              $reputation['min_bound'] = $i == count($this->reputations) - 1 ? "<strong>- &infin;</strong>" : $reputation['min_bound'];
              $reputation['max_bound'] = $i == 0 ? "<strong>&infin;</strong>" : $reputation['max_bound'];
          ?>
              <tr>
                  <td><?= ($i + 1) ?></td>
                  <td><?= $reputation['name'] ?></td>
                  <td><?= $reputation['max_bound'] ?></td>
                  <td><?= $reputation['min_bound'] ?></td>
                  <td>
                    <a href="administration/settings/<?= $reputation['idReputation'] ?>">
                      <button type="button" class="btn btn-warning btn-circle">
                        <i class="fa fa-edit"></i>
                      </button>
                    </a>
                    <a href="reputations/delete/<?= $reputation['idReputation'] ?>">
                      <button type="button" class="btn btn-danger btn-circle">
                        <i class="fa fa-trash"></i>
                      </button>
                    </a>
                  </td>
              </tr>
          <?php endfor; ?>
        </tbody>
    </table>
</div>
