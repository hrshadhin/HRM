<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>

  .bg{
    width: 100%;

  }
  .bg2{
    width: 100%;
    background-color:#cccccc;
  }
  .bg3{
    width: 100%;

  }

  table {
    border-spacing: 0;
    border-collapse: separate;

  }
  table td{
    padding-left: 5px;
    width: 100%;
  }
  .thead td{
    border-bottom: solid black 2px;
    font-weight: bolder;
    color:#000;
  }
  .red
  {
    color:red;
    font-weight: bold;
  }
  .green {
    color:#000;
    font-weight: bold;
  }
  .logo{
    height: 150px;
    width: 200px;
  }
  .lefthead{
    width: 30%;
  }
  .righthead{
    width: 70%;
  }
  .righthead p{
    margin: 0px;
    padding: 0px;
  }
  .borderBottom  td{
    border-bottom:1px dotted #000;
    /*Rest of stuff here*/
}
  #footer
  {

    width:100%;
    height:50px;
    position:absolute;
    bottom:0;
    left:0;
  }
  </style>
</head>

<body >
  <div id="admit">
    <table class="bg">
      <tr>
        <td class="lefthead">

          <img class="logo" src="./assets/img/logo.png">
        </td>

        <td class="righthead">
          <h3>Partex Builders Lmited</h3>
          <pre>
            <p>House #32,Road#13/a,Block#D,Banani,Dhaka-1213</p>
            <p>Phone: 880-2-9888325 Fax: 880-2-9854282</p>
            <p>Email: pbl@psgbd.com</p>
            <p>Web: http://www.partexbuilders.com</p>
          </pre>
        </td>
      </tr>

    </table>
    <table class="bg2">
      <tr><td>
        Projects Report
      </td>
      <td >

      </td>
    </tr>
  </table>
  <br>
  <table class="bg3">

    <tr class="thead">
      <td>Name </td>

      <td>Area</td>
      <td>Road No</td>
      <td>Block/Sector No</td>
      <td>Address</td>
    </tr>

    @foreach($projects as $project)
    <tr class="borderBottom">
      <td>{{$project->name}}</td>
      <td>{{$project->area}}</td>
      <td>{{$project->roadNo}}</td>
      <td>{{$project->sectorNo}}</td>
      <td>{{$project->address}}</td>
    </tr>

  @endforeach



  </table>

    <div id="footer">
      <p><strong>Print Date: {{date('F j, Y')}}<strong></p>
    </div>
  </body>
  </html>
