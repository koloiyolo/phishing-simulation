<?php
include("functions.php");
include("database.php");
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">
<br/>
<h1>
    <?php echo get_translation("result_title") ?>
</h1>
<br/>
<p>
    <?php echo get_translation("result_summary1"); 
    echo query_statement("SELECT COUNT(ip) as i FROM visit")[0]->i;
    ?>
</p>
<p>
    <?php echo get_translation("result_summary2");
    echo query_statement("SELECT COUNT(DISTINCT ip) as i FROM visit")[0]->i;
    ?>
</p>
<br/>
<h3>
    <?php echo get_translation("result_t1_title") ?>
</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <?php
                echo get_translation("result_t1_1")
                ?>
            </th>
            <th>
                <?php
                echo get_translation("result_t1_2")
                ?>
            </th>
            <th>
                <?php
                echo get_translation("result_t1_3")
                ?>
            </th>
            <th>
                <?php
                echo get_translation("result_t1_4")
                ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $result = fetch_visits(false);

            foreach ($result as $visit) {
            echo 
            "<tr>
            <td>{$visit->id}</td>
            <td>{$visit->date}</td>
            <td>{$visit->ip}</td>
            <td>{$visit->dns}</td>
            </tr>";
                
            }
        ?>
    </tbody>
</table>

<br/>

<h3>
    <?php echo get_translation("result_t2_title") ?>
</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <?php echo get_translation("result_t2_2") ?>
            </th>
            <th>
                <?php echo get_translation("result_t2_3") ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $result = fetch_visits(true);

            foreach ($result as $visit) {
            echo 
            "<tr>
            <td>{$visit->ip}</td>
            <td>{$visit->dns}</td>
            </tr>";
                
            }
        ?>
    </tbody>
</table>

</body>
</html>