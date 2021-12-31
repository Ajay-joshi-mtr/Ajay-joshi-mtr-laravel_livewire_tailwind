<!DOCTYPE html>
<html>

<head>
    <title>New Topic Request</title>
</head>

<body>
    <table>
        <tr>
            <td>Name : </td>
            <td>{{ $details['name'] }}</td>
        </tr>
        <tr>
            <td>Mobile : </td>
            <td>{{ $details['mobile'] }}</td>
        </tr>
        <tr>
            <td>Email : </td>
            <td>{{ $details['email'] }}</td>
        </tr>
        <tr>
            <td>Title : </td>
            <td>{{ $details['title'] }}</td>
        </tr>
       
        <tr>
            <td>Domain : </td>
            <td>{{ $details['domain'] }}</td>
        </tr>
    </table>
</body>

</html>