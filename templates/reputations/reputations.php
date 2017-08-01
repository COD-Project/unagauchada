<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Límite Inferior</th>
                <th>Límite Superior</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
          <?php
          for ($i=0; $i < count($this->reputations); $i++) {
              $reputations = $this->reputations[$i];
              $reputations['min_bound'] = $i == 0 ? "-&infin;" : $reputations['min_bound'];
              $reputations['max_bound'] = $i == count($this->reputations) ? "&infin;" : $reputations['max_bound'];
              echo("
              <tr>
                  <td>" . ($i + 1) . "</td>
                  <td>" . $reputations['name'] . "</td>
                  <td>" . $reputations['min_bound'] . "</td>
                  <td>" . $reputations['max_bound'] . "</td>
                  <td>
                    <a href=\"reputations/edit/" . $reputation['idReputation'] . "\">
                      <button type=\"button\" class=\"btn btn-danger btn-circle\">
                        <i class=\"fa fa-trash\"></i>
                      </button>
                    </a>
                    <a href=\"reputations/delete/" . $reputation['idReputation'] . "\">
                      <button type=\"button\" class=\"btn btn-danger btn-circle\">
                        <i class=\"fa fa-trash\"></i>
                      </button>
                    </a>
                  </td>
              </tr>
            ");
          }
          ?>
        </tbody>
    </table>
</div>
