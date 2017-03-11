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
          <h3>Shanix Dream Home Lmited</h3>
          <pre>
            <p>23/1/A Shukrabad,Dhaka-1207</p>
            <p>Phone: 880-2-8457142 Fax: 880-2-8457142</p>
            <p>Email: contact@shanixdev.com</p>
            <p>Web: http://shanixdev.com</p>
          </pre>
        </td>
      </tr>

    </table>
    <table class="bg2">
      <tr><td>
        Coustomers Report
      </td>
      <td >

      </td>
    </tr>
  </table>
  <br>
  <table class="bg3">

    <tr class="thead">
      <td>Name </td>
      <td>Profession </td>
      <td>Cell No</td>
      <td>Phone No</td>
      <td>Email</td>
      <td>Mailing. Address</td>
      <td>Entry Date</td>
    </tr>

    @foreach($customers as $customer)
    <tr class="borderBottom">
      <td>{{$customer->name}}</td>
      <td>{{$customer->profession}}</td>
      <td>{{$customer->cellNo}}</td>
      <td>{{$customer->phoneNo}}</td>
      <td>{{$customer->email}}</td>
      <td>{{$customer->mailingAddress}}</td>
      <td>{{$customer->created_at->format('F j, Y')}}</td>
    </tr>

  @endforeach



  </table>

    <div id="footer">
      <p><strong>Print Date: {{date('F j, Y')}}<strong></p>
    </div>
  </body>
  </html>
