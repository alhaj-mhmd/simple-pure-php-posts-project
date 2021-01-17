<?php
include('config.php');
if (isset($_POST['skill'])) {
    if (empty(trim($_POST['skill']))) {
        $data= '<p class="text-danger">Please enter a skill.</p>';
    } else {
        $skill = $_POST['skill'];
    }

    if (isset($skill)) {
        $sql = "SELECT * FROM posts WHERE skills LIKE '%$skill%'";
        if ($stmt = $pdo->prepare($sql)) {
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data =  '<div class="table-responsive">'.
                     '<table class="table table-bordered table-striped text-center">
                            <tr>
                            <th>id</th>
                            <th>type</th>
                            <th>skills</th>
                            <th>Action</th>
                            </tr>';

                    while ($row = $stmt->fetch()) {
                        $data.= '<tr>'
                            . '<td>' . $row['id'] . '</td>'
                            . '<td>' . $row['type'] . '</td>'
                            . '<td>' . $row['skills'] . '</td>';
                            $data.= '<td>
                                    <form action="post.php" method="post">
                                     <input type="hidden" name="id" value="' . $row['id'] . '">
                                     <input type="submit" name="submit" value="Details">
                                      </form>
                                </td>';
                        $data.='</tr>';
                    }
                    $data.= '</table>'
                    . '</div>';
                    // Free result set
                    unset($result);
                } else {
                    $data= '<p class="text-danger"> No records matching your query were found.</p>';
                }
            }
        }

        unset($stmt);
    }
}

die( json_encode(array('data'=>$data)));