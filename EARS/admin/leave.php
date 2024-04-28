<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management System</title>
</head>
<body>
    <h1>Leave Management System</h1>


    <form id="leave-form">
        <div>
            <label for="leave_type">Leave Type:</label>
            <input type="text" id="leave_type" name="leave_type" required>
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <button type="submit">Submit Leave Request</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
     
        $(document).ready(function(){
            $('#leave-form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'add_leave.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(resp) {
                        if (typeof resp !== 'undefined') {
                            resp = JSON.parse(resp);
                            if (resp.status == 1) {
                                alert(resp.msg);
                                
                            } else {
                                alert(resp.msg);
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
