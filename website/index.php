<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Aanwezigheden</title>


    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>

<body>

    <input type="date" id="selected-date" class="form-control" style="width:15rem; margin-left: 1rem;"><br>
    <select id="selected-period" class="form-control" style="width:15rem; margin-left: 1rem;">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
    </select>
    <br>
    <div class="dropdown">
        <select onchange="loadData()"  id="selected-classgroup" class="form-select" style="width:15rem; margin-left: 1rem;" aria-label="Default select example">
            <option value="" selected disabled>Select Classgroup</option>
            <option value="6ICW">6ICW</option>
            <option value="6TWE">6TWE</option>
            <option value="6ME">6ME</option>
        </select>
    </div>
    <br>

    <table>
        <thead>
            <tr>
                <!-- vanboven -->
                <th style="width:25%; background-color:lightblue;">Naam</th>
                <th style="width:25%; background-color:lightblue;">Klas</th>
                <th style="width:25%; background-color:lightblue;">Aanwezigheid</th>
                <th style="width:25%; background-color:lightblue;">Datum</th>
            </tr>
        </thead>
        <tbody id="list">
        </tbody>
    </table>


</body>
<script>
    // voert functie uit als document geladen is 
    $(document).ready(function() {
        // Set default date to today
        let today = new Date().toISOString().split('T')[0];
        $('#selected-date').val(today);
        loadData();
    });

    function loadData() {
        const date = $('#selected-date').val();
        const period = $('#selected-period').val();
        const classgroup = $('#selected-classgroup').val();
        if (!classgroup) {
            $('#list').html('');
            return;
        }
        $.ajax({
            url: './includes/recieveData.php',
            type: 'POST',
            data: {
                date,
                period,
                classgroup
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#list').html(data);
            }
        });
    }

    $('#selected-date').on('change', loadData);
    $('#selected-period').on('change', loadData);
    $('#selected-classgroup').on('change', loadData);
</script>

</html>
