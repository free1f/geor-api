<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report</title>
  </head>
  <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;    
        }
    </style>
  <body>
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>Report</h1>
          <div class="date">Date: {{date('F j, Y')}}</div>
        </div>
      </div>
        @foreach($concessionaires as $concessionary)

        <h3>{{ $concessionary['name'] }} </h3>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Specific Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ ($concessionary['status'] == 1 ? 'Activo' : 'Inactivo') }}</td>
                    <td>{{ $concessionary['country']}}</td>
                    <td>{{ $concessionary['state']}}</td>
                    <td>{{ $concessionary['city']}}</td>
                    <td>{{ $concessionary['address']}}</td>
                </tr>
            </tbody>
        </table>

                <table>
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Last name</th>
                            <th>Identification</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($concessionary['clients'] as $client)
                        <tr>
                            <td>{{ $client['status']}}</td>
                            <td>{{ $client['name']}}</td>
                            <td>{{ $client['last_name']}}</td>
                            <td>{{ $client['identification']}}</td>
                            <td>{{ $client['created_at']}}</td>
                            <td>{{ $client['updated_at']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        @endforeach
  </body>
</html>