<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notif Permit</title>
    <style>
        table, th, td {
                border-width: 300px;
                border-spacing: 0px;
                border: 3px solid black;
                border-collapse: collapse;
                font-size: 8pt;
                margin: 5px;
                padding: 7px;
            }
    </style>
</head>
<body>
    <div class="card">
        <h3 class="">Hallo, DC Team!</h3>
        <p>Mohon untuk review dan check permit dari team BM yang telah di submit.
            Link terlampir </p>
            {{-- <table>
                <thead>
                    <tr>
                        <th>No. Permit</th>
                        <th>Date of Request</th>
                        <th>Purpose of Work</th>
                        <th>Validity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->cleaning_id }}</td>
                        <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y')  }}</td>
                        <td>{{ $data->cleaning_work }}</td>
                        <td>{{ Carbon\Carbon::parse($data->validity_from)->format('d-m-Y') }}</td>
                    </tr>
                </tbody>
            </table> --}}
        <p>Silahkan Login di  <a href="http://172.16.45.195:8000/approval/all">sini</a></p>
    </div>
</body>
</html>
