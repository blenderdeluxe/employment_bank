<!DOCTYPE html>
<html>
<head><title>Laravel</title>
<link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
<style>
td{padding: 5px;}
html, body {
    height: 100%;
}
body {
    margin: 0;
    padding: 0;
    width: 100%;
    display: table;
    font-family: "Nunito",myriad pro,tahoma,sans-serif;
}
.container {
    text-align: center;
    display: table-cell;
    vertical-align: middle;
}
.content {
    text-align: center;
    display: inline-block;
}
.title {
    font-size: 96px;
}
.table1{
	width: 800px;
	margin: auto;
	height: 20px;
	border: 0px solid;
	background: #1ABC9C;
	table-layout: fixed;
}
.table2{
	width: 624px;
	margin: auto;
	height: 450px;
	margin-top: 0px;
  margin-bottom:0px;
	border: 0px solid;
	text-align: left;
	table-layout: fixed;
}
.table3{
	width: 166px;
	margin-top: 0px;
  margin-bottom: 180px;
	height: 150px;
	border: 0px solid;
	table-layout: fixed;
}
.table4{
	border: 1px solid #1ABC9C;
	background: #1ABC9C;
}
.table5{
	border: 1px solid #1ABC9C;
	table-layout: fixed;
	height: 400px;
}
.table6{
	width: 800px;
	table-layout: fixed;

}
.table7{
	border: 1px solid #1ABC9C;
	table-layout: fixed;
	height: 100px;
	text-align: left;
	color: #000;
}
.table8{
	border: 1px solid #1ABC9C;
	table-layout: fixed;
	height: 100px;
}
@media print {
   .noprint{
      display: none !important;
   }
}
</style>
    </head>
    <body>
    @if($result)
    @foreach($result as $data)
    <div class="container">
        <div class="content">
        <table class="table4">
      	<tr>
      		<td class="post-resume-page-title">
      			<table class="table1">
      				<tr>
      					<td align="center"><b><h3><font color="#fff">Dear {{ $data->fullname}}</font></h3></b></td>
                <td align="center"><b><h3><font color="#fff">USER ID: {!! $data->index_card_no !!}</font></h3></b></td>
      	       </tr>
            </table>
          </td>
        </tr>
        </table>
          <table class="table5">
          	<tr>
          		<td>
          		<table class="table2">
              		<tr><td><!--Thank you for Enrolment in Employment Bank.</td><td valign="bottom"><a href="#">
              		         View Index Card</a>-->
              			</td>
              		</tr>
              		<tr><td>Your Temporary <b>Index</b> No:</td><td><b>IN-{!! $data->index_card_no !!}</b></td></tr>
              		<tr><td>Date of Enrolment</td><td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td></tr>
              		<tr><td>Name :</td><td>{{ $data->fullname }}</td></tr>
              		<tr><td>Date of Birth :</td><td>{{ date('d-m-Y',strtotime($data->dob)) }}</td></tr>
              		<tr><td>Caste :</td><td>{{ $data->caste}}</td></tr>
              		<tr><td>Physically Challenged:</td><td>{{ $data->physical_challenge }}</td></tr>
              		<tr><td>Ex-serviceman:</td><td>{{ $data->ex_service }}</td></tr>
              		<tr><td>Exam Passed:</td><td>{{ $data->exam_name }}</td></tr>
              		<tr><td>Subject/TRADE</td><td>{{ $data->subject }}</td></tr>
              		<tr><td>Proof of Residence:</td><td>{{ $data->id_proof }}</td></tr>
              		<tr><td>Residence Proof/Id No:</td><td>{{ $data->proof_no }}</td></tr>
              	</table>
          		</td>
          		<td>
          			<table class="table3">
              		<tr>
                    <td><img src="{{asset($data->photo_url)}}" alt="Photo Image" height="160" width="130"></td>
                  </tr>
              			<tr><td><img src="sig.jpg" width="130" height="100" hidden ></td></tr>
              		</table>
          		</td>
          	</tr>
          </table>
            <table class="table7">
            	<tr>
            		<td>
            			<table class="table6">
		            		<tr>
		            			<td>
		            				You are requested to visit your nearest Employment Exchange within 60 days with all certificates in original for validation of your Enrolment no.
									This is a computer generated document. So prior authorization and approval by Employment Exchange is required for using it as a valid ID Card. Your Membership will be on hold till the time you don't verfy your documents at the Employment Exchange.
									&emsp;&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<font color="#000">For Dept use only</font>
							     </td>
		            		</tr>
		            	</table>
            		</td>
            	</tr>
            </table>
            <table class="table8">
            	<tr>
            		<td>
            			<table class="table6">
		            		<tr>
		            			<td align="left" valign="bottom">
		            				<button class="noprint" onclick='window.print()'>Print</button>
							     </td>
							     <td align="center" valign="bottom">
							     	(Authorized Signatory)
							     </td>
		            		</tr>
		            	</table>
            		</td>
            	</tr>
            </table>
            </div>
        </div>
        @endforeach
        @else
        No Id Card Generated.
        @endif
    </body>
</html>
