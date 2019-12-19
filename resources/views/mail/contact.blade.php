<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        body {
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
        }
    </style>
</head>

<body>
<table>
    <tr>
        <th style="background-color: #F2F2F2">Name</th>
        <td>{{ $data['name'] }}</td>
    </tr>

    <tr>
        <th style="background-color: #F2F2F2">Email</th>
        <td>{{ $data['email'] }}</td>
    </tr>

    <tr>
        <th style="background-color: #F2F2F2">Subject</th>
        <td>{{ $data['subject'] }}</td>
    </tr>

    <tr>
        <th style="background-color: #F2F2F2">Message</th>
        <td style="white-space: pre">{{ $data['message'] }}</td>
    </tr>
</table>
</body>
</html>
