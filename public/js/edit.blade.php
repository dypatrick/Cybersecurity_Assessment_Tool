@extends('layouts.layout')


@section('specificCSS')
<style type="text/css">
/* the css for the Accordion Titles */
    .headerText{
      font-family: 'Fira Sans', sans-serif;
      color: #007baf;
      font-size: 20px;
    }
/* the css to underline the section title */
    .blueLineTitle{
      text-decoration: none;
      border-bottom: 3px solid #007baf;
    }

    /* Checkbox Style */
          @keyframes click-wave {
        0% {
          height: 17px;
          width: 17px;
          opacity: 0.35;
          position: relative;
        }
        100% {
          height: 70px;
          width: 70px;
          margin-left: -25px;
          margin-top: -25px;
          opacity: 0;
        }
      }

      .option-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 3.5px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 17px;
        width: 17px;
        transition: all 0.15s ease-out 0s;
        background: white;
        border: 0.5px solid #cbd1d8;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.15rem;
        margin-left: 0.15rem;
        outline: none;
        position: relative;
        z-index: 1000;
      }
      .option-input:hover {
        background: #cbd1d8;
      }
      .option-input:checked {
        background: #007baf;
      }
      .option-input:checked::before {
        height: 17px;
        width: 17px;
        position: absolute;
        content: '✔';
        display: inline-block;
        font-size: 15px;
        text-align: center;
        line-height: 17px;
      }
      .option-input:checked::after {
        -webkit-animation: click-wave 0.65s;
        -moz-animation: click-wave 0.65s;
        animation: click-wave 0.65s;
        background: #007baf;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
      }
      .option-input.radio {
        border-radius: 50%;
      }
      .option-input.radio::after {
        border-radius: 50%;
      }
      .inlineText{
        display:inline;
      }

      /* 2-COLUMN LAYOUT */
      .columnsContainer, footer, header { position: relative; margin: .5em; }

      .leftColumn { margin-bottom: .5em; }

      /* MEDIA QUERIES */
      @media screen and (min-width: 47.5em ) {
        .leftColumn {margin-right: 15em; }

        .rightColumn {position: absolute; top: 90px; left:500px; right: 0; }   
      }
      ::placeholder {
        font-size: 13px;
        text-align: right;
        font-style: normal;
        color: #898988;
    }
    .labelCosts{
      text-align:center;
    }

    input[type="number"]:read-only {
    cursor: normal;
    background-color: #f8f8f8;
}
   
</style>
@endsection

@section('content')
@php
date_default_timezone_set("America/New_York");
$currentDate=date("Y-m-d");
@endphp
<!-- Title & Top buttons -->
<h3> Edit Due Process {{$dueP->casenum}} 
    <div style="float:right">
        <button type="button" class="btn btn-info" name="GenerateLetter" title="Generate Letter" data-toggle="modal" data-target="#generateModal"><i class="fas fa-download"></i>
        </button>
        <button type="button" class="btn btn-info" name="ExtendCase" title="Extend Case" data-toggle="modal" data-target="#extendModal"><i class="far fa-clock"></i>
        </button>
        <button type="button" class="btn btn-info" name="LinkCase" title="Link Case" data-toggle="modal" data-target="#linkModal"><i class="fas fa-link"></i>
        </button>
        <button type="button" class="btn btn-danger" name="DeleteCase" title="Delete Case" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-archive"></i>
        </button>
    </div>
</h3>
<br><br>

<div class="myaccordion" id="accordionDueProcess">
    <form method="post" action="{{ action('DueProcessController@update', ['dueprocess' => $dueP->id]) }}" name="myForm">
        @method('PATCH')
        @csrf
    <!-- First Card -->
      <div class="card">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h2 class="mb-0">
            <button class="btn btn-link colorchange" type="button" >
              <h6 class="headerText"> Basic Information </h6>
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionDueProcess">
          <div class="card-body">
            <!-- Body content -->
            <div class="row">
            <div class="col-sm-12">
            <label for="dateReceived">Date Received: <input type="date" name="dateReceived" id="dateReceived" max="{{$currentDate}}" value="{{$dueP->recvdt}}"/></label><br>
            <label for="hearingBegins">Hearing Begins: <input type="date" name="hearingBegins" id="hearingBegins" value="{{$dueP->hrngbegndt}}"/></label><br>
            <label for="hearingOfficerAssigned">Date of Hearing Officer Assigned: <input type="date" id="hearingOfficerAssigned" name="hearingOfficerAssigned" value="{{$dueP->hrngasgndt}}"/></label><br>
            <label for="countyInitiated">
            @if($dueP->countyinit=="1")
                    <input type="checkbox" id="countyInitiated" name="countyInitiated" class="option-input checkbox" checked/>
                    County Initiated
                    @else
                    <input type="checkbox" id="countyInitiated" name="countyInitiated" class="option-input checkbox" />County Initiated
            @endif
                  </label></p>
            <label for="dropdown1">County: <select id="dropdown1" name="county">
                                    @foreach($counties as $county)
                                    @if($county->county_id==$dueP->countyid)

                                            <option value="{{$county->county_id}}" selected>{{$county->name}}</option>  
                                            @else
                                            <option value="{{$county->county_id}}" >{{$county->name}}</option>  
                                            @endif
                                    @endforeach
                                </select></p>
            @if($noOfAttorney==0)
           <div class="tab-content group" id="tab_content">
           <label for="attorney">County Attorney: <select id="attorney" name="attorney">
                                    @foreach($attorneys as $attorney)
                        
                                            <option value="{{$attorney->id}}" >{{$attorney->name}}</option>  
                                          
                                    @endforeach
               </select>&nbsp&nbsp<a href="javascript:void(0)" class="addMore">  + Add another County Attorney</a></label>
               </div> 
          @else
          @php
          $iAtt=0;
          @endphp
          @while($iAtt<$noOfAttorney)
          <div class="tab-content group" id="tab_content">
          <label for="attorney_{{$iAtt}}">County Attorney: <select id="attorney_{{$iAtt}}" name="attorney_{{$iAtt}}">
                                    @foreach($attorneys as $attorney)
                                    @if($attorney->name==$arrayAtt[$iAtt]->name)
                                            <option value="{{$attorney->id}}" selected>{{$attorney->name}}</option>  
                                            @else
                                            <option value="{{$attorney->id}}" >{{$attorney->name}}</option>  
                                            @endif
                                    @endforeach
            </select>
            @if($iAtt==0)
            &nbsp&nbsp<a href="javascript:void(0)" class="addMore">  + Add another County Attorney</a></label> 
            @else
            
            &nbsp&nbsp<a href="javascript:void(0)" class="remove"> - Remove this County Attorney</a>
            @endif
            <input type="hidden" name="noOfAttorney" id="noOfAttorney" value="{{$noOfAttorney}}"/>
            </div>
          @php
          $iAtt++;
          @endphp
          @endwhile
          @endif
          
         
          </div></div>

          <div class="float-right">
          <button type="submit" class="btn btn-success" name="action" value="save" id="saveDueProcessBtn" data-toggle="tooltip" data-placement="right" title="Save">Save</button>
          <button type="submit" class="btn btn-warning">Save & Exit</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn1">Exit</button>
          <br> <br>
          </div>
          </div>
        </div>
      </div>

      
      <!-- copy of input fields group for County Attorney-->
    <div class="tab-content groupCopy" style="display:none" id="tab_content">
    &nbsp&nbsp<a href="javascript:void(0)" class="remove"> - Remove this County Attorney</a>
    </div>


    <!-- Second Card -->
      <div class="card">
        <div class="card-header" id="headingTwo"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button">
            <h6 class="headerText">Student & Complainant</h6>
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDueProcess">
          <div class="card-body">
          <div class="row">
          <div class="col">
          <h6><u class="blueLineTitle">STUDENT INFORMATION</u></h6>
          <label for="studentFirstName"> First Name: <input type="text" id="studentFirstName" name="studentFirstName" maxlength="255" value="{{$student->fname}}"/></label><br>
          <label for="studentLastName"> Last Name: <input type="text" id="studentLastName" name="studentLastName" maxlength="255"  value="{{$student->lname}}"/></label><br>
          <label for="studentStreet1"> Street 1: <input type="text" id="studentStreet1" name="studentStreet1" maxlength="255"  value="{{$student->street1}}"/></label><br>
          <label for="studentStreet2"> Street 2: <input type="text" id="studentStreet2" name="studentStreet2" maxlength="255"  value="{{$student->street2}}"/></label><br>
          <label for="studentCity"> City: <input type="text" id="studentCity" name="studentCity" maxlength="255" value="{{$student->city}}"/></label><br>
          <label for="studentState"> State: <select id="studentState" name="studentState">
                                    @foreach($states as $state)
                                    <!-- Select WV by default -->
                                            @if($state->abbrevname == $student->state) 
                                            <option value="{{$state->abbrevname}}" selected>{{$state->abbrevname}}</option>  
                                            @else
                                            <option value="{{$state->abbrevname}}">{{$state->abbrevname}}</option>  
                                            @endif
                                    @endforeach</select></label><br>
          <label for="studentZip"> Zip: <input type="text"  id="studentZip" name="studentZip" maxlength="255" value="{{$student->zipcode}}"/></label><br>
          <label for="studentPhone"> Phone: <input type="text" id="studentPhone" name="studentPhone" maxlength="255" value="{{$student->phone}}"/></label><br>
          <label for="studentSchool"> School: <input type="text" id="studentSchool" name="studentSchool" maxlength="255" value="{{!empty($school->name) ? $school->name:'' }}"/></label><br>
          </div>
          <div class="col">
          

        @if($noOfComp==0)
        <div class="tab-content group2" id="tab_content2">
          <h6><u class="blueLineTitle">COMPLAINANT INFORMATION</u> <label for="initiator">
          <input type="checkbox" id="initiator" name="initiator" class="option-input checkbox" />Initiator</label></h6>
          <label for="complainantType">Complainant Type: <select id="complainantType" name="complainantType">
          <option value="Parent" >Parent</option>
          <option value="District">District</option>
          <option value="Advocate">Advocate</option>
          </select></label><br>
          <label for="complainantFirstName"> First Name: <input type="text" id="complainantFirstName" name="complainantFirstName" maxlength="255"/></label><br>
          <label for="complainantLastName"> Last Name: <input type="text" id="complainantLastName" name="complainantLastName" maxlength="255"/></label><br>
          <label for="complainantStreet1"> Street 1: <input type="text" id="complainantStreet1" name="complainantStreet1" maxlength="255"/></label><br>
          <label for="complainantStreet2"> Street 2: <input type="text" id="complainantStreet2" name="complainantStreet2" maxlength="255"/></label><br>
          <label for="complainanttCity"> City: <input type="text" id="complainanttCity" name="complainantCity" maxlength="255"/></label><br>
          <label for="complainantState"> State: <select id="complainantState" name="complainantState">
                                    @foreach($states as $state)
                                    <!-- Select WV by default -->
                                            @if($state->abbrevname == "WV") 
                                            <option value="{{$state->abbrevname}}" selected>{{$state->abbrevname}}</option>  
                                            @else
                                            <option value="{{$state->abbrevname}}">{{$state->abbrevname}}</option>  
                                            @endif
                                    @endforeach</select></label><br>
          <label for="complainantZip"> Zip:<input type="text"  id="complainantZip" name="complainantZip" maxlength="255"/></label><br>
          <label for="complainantPhone"> Phone: <input type="text" id="complainantPhone" name="complainantPhone" maxlength="255"/></label><br>
          <label for="complainantCounsel"> Counsel: <input type="text" id="complainantCounsel" name="complainantCounsel" maxlength="255"/></label><br>
          <br><a href="javascript:void(0)" class="addMore2">  + Add another Complainant</a>  
          </div>
          </div>
          </div>
          </div>
        </div>
      </div>
      @else
        @php $i=0;@endphp
        @while($i<$noOfComp)
        <div class="tab-content group2" id="tab_content2">
          <h6><u class="blueLineTitle">COMPLAINANT INFORMATION</u> <label for="initiator_{{$i}}">
          @if($dueP->instigator==$arrayComp[$i]->id)
          <input type="checkbox" id="initiator_{{$i}}" name="initiator_{{$i}}" class="option-input checkbox" checked/>Initiator</label></h6>
          @else
          <input type="checkbox" id="initiator_{{$i}}" name="initiator_{{$i}}" class="option-input checkbox" />Initiator</label></h6>
          @endif

          <label for="complainantType_{{$i}}">Complainant Type: <select id="complainantType_{{$i}}" name="complainantType_{{$i}}">
          @if($arrayComp[$i]->compltype=="Parent")
          <option value="Parent" selected>Parent</option>
          <option value="District">District</option>
          <option value="Advocate">Advocate</option>
          @elseif($arrayComp[$i]->compltype=="District")
          <option value="District" selected>District</option>
          <option value="Parent" >Parent</option>
          <option value="Advocate">Advocate</option>
          @elseif($arrayComp[$i]->compltype=="Advocate")
          <option value="Advocate" selected>Advocate</option>
          <option value="Parent" >Parent</option>
          <option value="District">District</option>
          @else
          <option value="Parent" >Parent</option>
          <option value="District">District</option>
          <option value="Advocate">Advocate</option>
          @endif
          </select></label><br>
          @php
            $fullname=explode(" ", $arrayComp[$i]->name);
            if(array_key_exists("0",$fullname))
            {$firstName=$fullname[0];}
            if(array_key_exists("1",$fullname))
            $lastName=$fullname[1];
          @endphp
          <label for="complainantFirstName_{{$i}}"> First Name: <input type="text" id="complainantFirstName_{{$i}}" name="complainantFirstName_{{$i}}" maxlength="255" value="{{$firstName}}"/></label><br>
          <label for="complainantLastName_{{$i}}"> Last Name: <input type="text" id="complainantLastName_{{$i}}" name="complainantLastName_{{$i}}" maxlength="255" value="{{$lastName}}"/></label><br>
          <label for="complainantStreet1_{{$i}}"> Street 1: <input type="text" id="complainantStreet1_{{$i}}" name="complainantStreet1_{{$i}}" maxlength="255" value="{{$arrayComp[$i]->street1}}"/></label><br>
          <label for="complainantStreet2_{{$i}}"> Street 2: <input type="text" id="complainantStreet2_{{$i}}" name="complainantStreet2_{{$i}}" maxlength="255" value="{{$arrayComp[$i]->street2}}"/></label><br>
          <label for="complainanttCity_{{$i}}"> City: <input type="text" id="complainanttCity_{{$i}}" name="complainantCity_{{$i}}" maxlength="255" value="{{$arrayComp[$i]->city}}"/></label><br>
          <label for="complainantState_{{$i}}"> State: <select id="complainantState_{{$i}}" name="complainantState_{{$i}}">
                                    @foreach($states as $state)
                                    <!-- Select WV by default -->
                                            @if($state->abbrevname == $arrayComp[$i]->state) 
                                            <option value="{{$state->abbrevname}}" selected>{{$state->abbrevname}}</option>  
                                            @else
                                            <option value="{{$state->abbrevname}}">{{$state->abbrevname}}</option>  
                                            @endif
                                    @endforeach</select></label><br>
          <label for="complainantZip_{{$i}}"> Zip:<input type="text"  id="complainantZip_{{$i}}" name="complainantZip_{{$i}}" maxlength="255" value="{{$arrayComp[$i]->zipcode}}"/></label><br>
          <label for="complainantPhone_{{$i}}"> Phone: <input type="text" id="complainantPhone_{{$i}}" name="complainantPhone_{{$i}}" maxlength="255" value="{{$arrayComp[$i]->phone}}"/></label><br>
          <label for="complainantCounsel_{{$i}}"> Counsel: <input type="text" id="complainantCounsel_{{$i}}" name="complainantCounsel_{{$i}}" maxlength="255" value="{{$arrayComp[$i]->counsel}}"/></label><br>
          @if($i==0)
          <br><a href="javascript:void(0)" class="addMore2">  + Add another Complainant</a> 
          @else
          <a href="javascript:void(0)" class="remove2"> - Remove this Complainant</a>
          @endif
          </div>
          <input type="hidden" name="noOfComp" id="noOfComp" value="{{$noOfComp}}"/>
        @php 
        $i++; 
        @endphp
        @endwhile
        @endif
         
          
          </div>
          </div>
          <div class="float-right">
          <button type="submit" class="btn btn-success" name="action" value="save" id="saveDueProcessBtn" data-toggle="tooltip" data-placement="right" title="Save">Save</button>
          <button type="submit" class="btn btn-warning">Save & Exit</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn2">Exit</button>
          <br> <br>
          </div>
          </div>
        </div>
      </div>

       <!-- copy of input fields group for Complainant-->
        <div class="tab-content groupCopy2" style="display:none" id="tab_content2">
        &nbsp&nbsp<a href="javascript:void(0)" class="remove2"> - Remove this Complainant</a>
        </div>

      <!-- Third Card -->
      <div class="card">
        <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" >
            <h6 class="headerText">Case Information</h6>
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionDueProcess">
          <div class="card-body">
          <div class="row">
            <div class="col">
                  <label for="expedited">
                  @if($dueP->expedited=="1")
                    <input type="checkbox" id="expedited" name="expedited" class="option-input checkbox" checked/>
                    Expedited Case
                  @else
                    <input type="checkbox" id="expedited" name="expedited" class="option-input checkbox" />
                    Expedited Case
                  @endif
                  </label>
                  <label for="extension">
                  @if($dueP->extended=="1")
                    <input type="checkbox" id="extension" name="extension" class="option-input checkbox" checked/>
                    Extension Granted
                    @else
                    <input type="checkbox" id="extension" name="extension" class="option-input checkbox" />
                    Extension Granted
                    @endif
                  </label>
                  <h6><u class="blueLineTitle">RESOLUTION</u></h6>
                  <label for="resolution">
                  @if($dueP->ressession=="1")
                    <input type="checkbox" id="resolution" name="resolution" class="option-input checkbox" checked/>
                    Resolution Session
                    @else
                    <input type="checkbox" id="resolution" name="resolution" class="option-input checkbox" />
                    Resolution Session
                    @endif
                  </label>&nbsp&nbsp&nbsp
                  <label for="resolutionDate">Resolution Date: <input type="date" name="resolutionDate" id="resolutionDate" tooltip="test" value="{{$dueP->resolutndt}}"/></label>

                  <!-- Calculating the 15 & 30 days dates-->
                  @php
                  date_default_timezone_set("America/New_York");
                  $date15 = date('Y-m-d'); 
                  $date15=date('Y-m-d', strtotime($date15. ' + 15 days')); 
                  $date30 = date('Y-m-d'); 
                  $date30=date('Y-m-d', strtotime($date30. ' + 30 days')); 
                  $final15 = date("m/d/Y", strtotime($date15));
                  $final30 = date("m/d/Y", strtotime($date30));
                  @endphp

                  <br>
                  <small> 15 Days:{{$final15}} &nbsp&nbsp 30 Days:{{$final30}}</small>
                  <h6><u class="blueLineTitle">MEDIATION</u></h6>
                  <label for="resolved">Resolved: <select name="resolved" id="resolved">
                  @if($dueP->medres=="Yes")
                  <option value="Yes" selected>Yes</option>
                  <option value="No">No</option>
                  @elseif($dueP->medres=="No")
                  <option value="No" selected>No</option>
                  <option value="Yes">Yes</option>
                  @else
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  @endif
                    </select></label><br>
                  <label for="inLieu">
                  @if($dueP->lieuofres=="1")
                    <input type="checkbox" id="inLieu" name="inLieu" class="option-input checkbox" checked/>
                    In Lieu of Resolution
                    @else
                    <input type="checkbox" id="inLieu" name="inLieu" class="option-input checkbox" />
                    In Lieu of Resolution
                    @endif
                  </label>
                  <h6><u class="blueLineTitle">LETTERS INFORMATION</u></h6>
                  <label for="followLetter">
                  @if($dueP->hasflwup=="1")
                    <input type="checkbox" id="followLetter" name="followLetter" class="option-input checkbox" checked/>
                    Follow-up Letter
                    @else
                    <input type="checkbox" id="followLetter" name="followLetter" class="option-input checkbox" />
                    Follow-up Letter
                    @endif
                  </label>&nbsp&nbsp&nbsp
                  <label for="followLDate">Follow-Up Letter Date: <input type="date" id="followLDate" name="followLDate" value="{{$dueP->flwupltrdt}}"/></label>
                  <br>
                  <label for="closedLetter">
                  @if($dueP->hasclltr=="1")
                    <input type="checkbox" id="closedLetter" name="closedLetter" class="option-input checkbox" checked/>
                    Closed Letter
                    @else
                    <input type="checkbox" id="closedLetter" name="closedLetter" class="option-input checkbox" />
                    Closed Letter
                    @endif
                  </label>&nbsp&nbsp&nbsp
                  <label for="closedLDate">Closed Letter Date: <input type="date" id="closedLDate" name="closedLDate" value="{{$dueP->clltrdt}}"/></label>
                  <h6><u class="blueLineTitle">EXPEDITED CASE INFORMATION</u></h6>
                  <label for="return">
                  @if($dueP->rtstdplcmt=="1")
                    <input type="checkbox" id="return" name="return" onClick="return KeepCount()" class="option-input checkbox" checked/>
                    Return Student to Current Placement
                    @else
                    <input type="checkbox" id="return" name="return" onClick="return KeepCount()" class="option-input checkbox" />
                    Return Student to Current Placement
                    @endif
                  </label>
                  <label for="change">
                  @if($dueP->chngplcmt=="1")
                    <input type="checkbox" id="change" name="change" onClick="return KeepCount()" class="option-input checkbox" checked/>
                    Change in Placement Ordered
                    @else
                    <input type="checkbox" id="change" name="change" onClick="return KeepCount()" class="option-input checkbox" />
                    Change in Placement Ordered
                  @endif
                  </label>
                 
            </div>
            <div class="col">
                <h6><u class="blueLineTitle">DISMISSAL ORDER</u></h6>
                <label for="dismissal">
                @if($dueP->iswdrawn=="1")
                    <input type="checkbox" id="dismissal" name="dismissal" class="option-input checkbox" checked/>
                    Dismissal Order (Withdrawn)
                    @else
                    <input type="checkbox" id="dismissal" name="dismissal" class="option-input checkbox" />
                    Dismissal Order (Withdrawn)
                @endif
                  </label>&nbsp&nbsp&nbsp
                  <label for="dismissalDate">Dismissal Date: <input type="date" id="dismissalDate" name="dismissalDate" value="{{$dueP->wdrawndt}}"/></label><br> 
                  <label for="dissReason">Dismissal Reason: </label><textarea name="dissReason" id="dissReason" rows="5" maxlength="255" class="hearingArea" >{{$dueP->wdrawnrsn}}</textarea>
                  <h6><u class="blueLineTitle">DECISION</u></h6>
                  <label for="decision">
                  @if($dueP->hasdecisn=="1")
                    <input type="checkbox" id="decision" name="decision" class="option-input checkbox" checked/>
                    Decision Made
                    @else
                    <input type="checkbox" id="decision" name="decision" class="option-input checkbox" />
                    Decision Made
                  @endif
                  </label>&nbsp&nbsp&nbsp
                  <label for="decisionDate">Decision Date: <input type="date" id="decisionDate" name="decisionDate" value="{{$dueP->decisiondt}}"/></label><br>
                  <label for="decisionFor">Decision For: <select name="decisionFor" id="decisionFor">
                  @if($dueP->decfor=="Parent")
                  <option value="Parent" selected>Parent</option>
                    <option value="County">County</option>
                    <option value="Split">Split</option>
                    <option value="Not Applicable">Not Applicable</option>
                  @elseif($dueP->decfor=="County")
                  <option value="Parent">Parent</option>
                    <option value="County" selected>County</option>
                    <option value="Split">Split</option>
                    <option value="Not Applicable">Not Applicable</option>
                  @elseif($dueP->decfor=="Split")
                  <option value="Parent">Parent</option>
                    <option value="County">County</option>
                    <option value="Split" selected>Split</option>
                    <option value="Not Applicable">Not Applicable</option>
                  @elseif($dueP->decfor=="Not Applicable")
                  <option value="Parent">Parent</option>
                    <option value="County">County</option>
                    <option value="Split">Split</option>
                    <option value="Not Applicable" selected>Not Applicable</option>
                    @else
                    <option value="Parent">Parent</option>
                    <option value="County">County</option>
                    <option value="Split">Split</option>
                    <option value="Not Applicable">Not Applicable</option>
                    @endif
                  </select></label><br>
                  <label for="excChild">Decision provided to the West Virginia Advisory Council for the Education of Exceptional Children: <input type="date" id="excChild" name="excChild" value="{{$dueP->wvacdecdt}}"/></label>
                  <h6><u class="blueLineTitle">APPEAL</u></h6>
                  <label for="appeal">
                  @if($dueP->hasappeal=="1")
                    <input type="checkbox" id="appeal" name="appeal" class="option-input checkbox" checked/>
                    Appeal
                    @else
                    <input type="checkbox" id="appeal" name="appeal" class="option-input checkbox" />
                    Appeal
                    @endif
                  </label>&nbsp&nbsp&nbsp
                  <label for="appealDate">Appeal Date: <input type="date" id="appealDate" name="appealDate" value="{{$dueP->appealdt}}"/></label>
                  <br>
                 <div id="appealRights">
                 </div>
                  
            </div></div>
            <div class="float-right">
                  <button type="submit" class="btn btn-success" name="action" value="save" id="saveDueProcessBtn" data-toggle="tooltip" data-placement="right" title="Save">Save</button>
                  <button type="submit" class="btn btn-warning">Save & Exit</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn3">Exit</button>
                  <br> <br>
            </div>
          </div>
        </div>
      </div>

      <!-- 4th Card -->
      <div class="card">
        <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" >
            <h6 class="headerText">Case Costs</h6>
            </button>
          </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionDueProcess">
          <div class="card-body">
            <label for="dphProf" class="labelCosts">DPH Prof. Costs
            <input type="number" id="dphProf"  name="dphProf" placeholder="0.00 " class="costBox" step="any" value="{{$dueP->dphprocost}}"/></label>
            <label for="courtReport" class="labelCosts">Court Reporter Costs
            <input type="number" id="courtReport" name="courtReport" placeholder="0.00 " class="costBox"  step="any" value="{{$dueP->ctrprtcost}}"/></label>
            <label for="dphTrav" class="labelCosts">DPH Trav. Costs
            <input type="number" id="dphTrav" name="dphTrav" placeholder="0.00 " class="costBox" value="{{$dueP->dphtvlcost}}" readonly /></label>
            <label for="dphExp" class="labelCosts">DPH Expenses
            <input type="number" id="ddphExp"  name="ddphExp" placeholder="0.00 " class="costBox" value="{{$dueP->dphexpense}}" readonly /></label>
            <br>
            <label for="seaTotal" class="labelCosts">SEA Total Costs
            <input type="text" id="seaTotal" name="seaTotal" class="costBoxCalc" value="{{$dueP->seacost}}" readonly /></label>
            <label for="leaTotal" class="labelCosts">LEA Total Costs
            <input type="text" id="leaTotal" name="leaTotal" class="costBoxCalc" value="{{$dueP->leacost}}" readonly /></label>
            <label for="hearingCost" class="labelCosts">Grand Total Hearing Costs
            <input type="text" id="hearingCost" name="hearingCost" class="costBoxHear" value="{{$dueP->grandcost}}" readonly /></label>
            <br><br>
            <button type="button" class="btn btn-secondary" id="calculate" name="calculate" onclick="myCalculation()">Calculate</button>
            <button type="button" class="btn btn-secondary" id="calculate" name="print" onclick="myPrint()">Print</button><br><br>
            <div class="float-right">
                  <button type="submit" class="btn btn-success" name="action" value="save" id="saveDueProcessBtn" data-toggle="tooltip" data-placement="right" title="Save">Save</button>
                  <button type="submit" class="btn btn-warning">Save & Exit</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn4">Exit</button>
                  <br> <br>
            </div>
          </div>
        </div>
      </div>

      <!-- 5th Card -->
      <div class="card">
        <div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" >
            <h6 class="headerText">Hearing Information</h6>
            </button>
          </h2>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionDueProcess">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <label for="hearingOff"><u class="blueLineTitle">HEARING OFFICER:</u></label>
                <br>
                <select id="dropdownHearingOfficers" name="hearingOff">
                                    <option value="0" selected>Select</option>
                                    @if(!empty($hearingOff->name))
                                    @foreach($officers as $officer)
                                    @if($officer->name==$hearingOff->name)
                                            <option value="{{$officer->id}}" selected>{{$officer->name}}</option>  
                                            @else
                                            <option value="{{$officer->id}}">{{$officer->name}}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach($officers as $officer)
                                            <option value="{{$officer->id}}">{{$officer->name}}</option>
                                  
                                    @endforeach
                                    @endif
                </select><br><br>
                <label for="currOff"><u class="blueLineTitle">CURRENT HEARING OFFICER</u>
                @if($hearingOff!=null)
                <p id="currOff">
                {{$hearingOff->name}}<br>{{$hearingOff->street1}}<br>{{$hearingOff->street2}}<br>{{$hearingOff->city}}, {{$hearingOff->state}} {{$hearingOff->zipcode}}<br>{{$hearingOff->phone}}<br>{{$hearingOff->email}}
                </p>
                @else
                <p id="currOff"></p></label>
                @endif
              </div>
              <div class="col">
              <p><u class="blueLineTitle">HEARING LOCATION:</u></p>
              <label for="street1">Street 1:
              <input type="text" id="hstreet1" name="hstreet1" value="{{$dueP->hrglocst1}}"/></label><br>
              <label for="street2">Street 2:
              <input type="text" id="hstreet2" name="hstreet2" value="{{$dueP->hrglocst2}}"/></label><br>
              <label for="city">City:
              <input type="text" id="hcity" name="hcity" value="{{$dueP->hrgloccity}}"/></label><br>
              <label for="state">State:
              <input type="text" id="hstate" name="hstate" value="{{$dueP->hrgstate}}"/></label><br>
              <label for="zip">Zip:
              <input type="text" id="hzip" name="hzip" value="{{$dueP->hrgloczip}}"/></label><br>
              </div>
              <div class="col">
              <p><u class="blueLineTitle">HEARING & TRANSCRIPT INFO:</u></p>
              <label for="hearingDate">Hearing Date:
              <input type="text" id="hearingDate" name="hearingDate" value="{{$dueP->hrngdt}}"/></label><br>
              <label for="hearingTime">Hearing Time:
              <input type="time" id="hearingTime" name="hearingTime" value="{{$dueP->hrngtime}}"/></label><br>
              <label for="transcript">Transcript Due:
              <input type="date" id="transcript" name="transcript" value="{{$dueP->tscrtduedt}}"/></label><br>
              <label for="transcriptCheck">
              @if($dueP->tscrontime=="1")
              <input type="checkbox" id="transcriptCheck" name="transcriptCheck" class="option-input checkbox" checked/>Transcript On Time</label>
              @else
              <input type="checkbox" id="transcriptCheck" name="transcriptCheck" class="option-input checkbox"/>Transcript On Time</label>
              @endif
              </div>
            </div>
            
            <div class="float-right">
                  <button type="submit" class="btn btn-success" name="action" value="save" id="saveDueProcessBtn" data-toggle="tooltip" data-placement="right" title="Save">Save</button>
                  <button type="submit" class="btn btn-warning">Save & Exit</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn5">Exit</button>
                  <br> <br>
            </div>
            
          </div>
        </div>
      </div>
    
    


      <!-- 6th Card -->
      <div class="card">
        <div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" >
            <h6 class="headerText">Hearing Orders</h6>
            </button>
          </h2>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionDueProcess">
          <div class="card-body">
          @if($noOfOrders==0)
            <div class="row">
            <div class="col-sm-12">
            <label for="hIssues"><u class="blueLineTitle">HEARING ISSUES:</u></label>
            <br>
            <textarea id="hIssues"  name="hIssues" class="hearingArea" maxlength="255" rows="5"></textarea>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
            <div class="tab-content group3" id="tab_content3">
            <label for="hOrders"><u class="blueLineTitle">HEARING ORDER:</u></label>
            <br>
            <textarea id="hOrders" name="hOrders" class="hearingArea" maxlength="255" rows="5"></textarea>
            <label for="dueDate">Due Date:
            <input type="date" id="dueDate" name="dueDate"/></label>
            <label for="completedDate">Date Completed:
            <input type="date" id="completedDate" name="completedDate"/></label>
            <br><a href="javascript:void(0)" class="addMore3">  + Add another Hearing Order</a>
            </div>
            </div>
            </div>
            @else
            <div class="row">
            <div class="col-sm-12">
            <label for="hIssues"><u class="blueLineTitle">HEARING ISSUES:</u></label>
            <br>
            <textarea id="hIssues"  name="hIssues" class="hearingArea" maxlength="255" rows="5" >{{$arrayOrd[0]->hrngissue}}</textarea>
            </div>
            </div>
            @php
            $iOrd=0;
            @endphp
            @while($iOrd<$noOfOrders)
            <div class="row">
            <div class="col-sm-12">
            <div class="tab-content group3" id="tab_content3">
            <label for="hOrders_{{$iOrd}}"><u class="blueLineTitle">HEARING ORDER:</u></label>
            <br>
            <textarea id="hOrders_{{$iOrd}}" name="hOrders_{{$iOrd}}" class="hearingArea" maxlength="255" rows="5">{{$arrayOrd[$iOrd]->hrngorder}}</textarea>
            <label for="dueDate_{{$iOrd}}">Due Date:
            <input type="date" id="dueDate_{{$iOrd}}" name="dueDate_{{$iOrd}}" value="{{$arrayOrd[$iOrd]->duedt}}"/></label>
            <label for="completedDate">Date Completed:
            <input type="date" id="completedDate_{{$iOrd}}" name="completedDate_{{$iOrd}}" value="{{$arrayOrd[$iOrd]->cmpltdt}}"/></label>
            @if($iOrd==0)
            <br><a href="javascript:void(0)" class="addMore3">  + Add another Hearing Order</a>
            @else
            &nbsp&nbsp<a href="javascript:void(0)" class="remove3"> - Remove this Hearing Order</a>
            @endif
            <input type="hidden" name="noOfOrders" id="noOfOrders" value="{{$noOfOrders}}"/>
            </div>
            </div>
            </div>
            @php
            $iOrd++;
            @endphp
            @endwhile
            @endif
            

            <div class="float-right">
                  <button type="submit" class="btn btn-success" name="action" value="save" id="saveDueProcessBtn" data-toggle="tooltip" data-placement="right" title="Save">Save</button>
                  <button type="submit" class="btn btn-warning">Save & Exit</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn6">Exit</button>
                  <br> <br>
            </div>

          </div>
        </div>
      </div>

      <!-- copy of input fields group for Hearing Order-->
      <div class="tab-content groupCopy3" style="display:none" id="tab_content3">
              &nbsp&nbsp<a href="javascript:void(0)" class="remove3"> - Remove this Hearing Order</a>
          </div>
      </form>
          
      <!-- 7th Card -->
      <div class="card">
          <div class="card-header" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" >
              <h6 class="headerText">Documents</h6>
              </button>
            </h2>
          </div>
          <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionDueProcess">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <p><u class="blueLineTitle">DOCUMENTS UPLOADED</u></p><br>
                  <table class="table table-hover">
                    @php
                      $files = $dueP->files;
                    @endphp
                    @foreach ($files as $file)
                      <tr>
                        <td>
                          <a download="{{$file->filename}}" href={{ Storage::url('Documents/DUEPROCESS/' . $dueP->id . '/' . $file->id) }} target="_blank"> {{ $file->filename }} </a>
                        </td>
                        <td>
                          <div class="float-left">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-file-{{ $file->id }}').submit();">
                              <button type="button" class="btn btn-danger btn-sm" name="delete" data-toggle="tolltip" title="Delete This Document"><i class="fa fa-trash"></i></button>
                            </a>
                            <form action="{{ action('FileController@destroy', ['fileID' => $file->id]) }}" method="POST" id="delete-file-{{ $file->id }}">
                              {{csrf_field()}}
                              {{ method_field('DELETE') }}
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <div class="float-right">
                <form id="uploadDocument" class="d-inline" method="POST" action="{{ action('FileController@store') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="fileUpload" id="fileUpload">
                  <input type="hidden" name="caseType" value="DUEPROCESS">
                  <input type="hidden" name="caseID" value="{{ $dueP->id }}">
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('uploadDocument').submit();">
                  <button type="button" class="btn btn-primary" name="upload"><i class="fas fa-file-upload"></i>Upload</button>
                </a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn7">Exit</button>
              </div>
            </div>
          </div>
        </div>
</div>
</form>

<!--Exit Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <h4><center/>Are you sure you want to exit without saving your recent progress?</h4>
                </div>
                <div class="modal-footer2">
                <a href="/DRMS/dueprocess">
                            <button type="button" class="btn btn-save" >Yes
                            </button>
                            
                </a>&nbsp;&nbsp;
               
                            <button type="button" data-dismiss="modal"  class="btn btn-primary">No
                            </button>
                            
                
                </div>
            </div>
            
            </div>
        </div>
    
<!-- Generate Letter Modal -->
<div class="modal fade" id="generateModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
          <form id="generate" method="GET" action="{{ action('LetterController@dueprocess') }}" class="d-inline">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Letter</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label for="letterType" class="col-md-3 col-form-label text-md-right">Letter Type: </label>
                <div class="col-md-9">
                  <select class="form-control" id="letterType" name="letterType">
                    @foreach ($letters as $letter => $letterName)
                        <option value={{$letter}}> {{ $letterName }} </option>
                    @endforeach
                  </select>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Generate</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
              {{-- <input type="hidden" name="superintendent" value="{{ $dueP->student->school->county->superintendent->name }}"> --}}
              {{--<input type="hidden" name="county" value="{{ $dueP->student->school->county->name }}">--}}
              <input type="hidden" name="casenumber" value="{{ $dueP->casenum }}">
              {{--  <input type="hidden" name="countyAttorney" value="{{ $dueP->countyAttorney->name }}">--}}
              {{--<input type="hidden" name="parentAttorney" value="{{ $dueP->parentAttorney->name }}">--}}
              <input type="hidden" name="parent" value="{{ $dueP->student->parents->map->name }}">
            </div>
          </form>
        </div>
    </div>
  </div>
  
  <!-- Extend Modal -->
  <div class="modal fade" id="extendModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
          <form id="saveExtend" method="POST" action="{{ action('DueProcessController@update', ['dueprocess' => $dueP->id]) }}" class="d-inline">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Extend Case</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                  <label for="extendDate" class="col-md-4 col-form-label text-md-left">Extension Date: </label>
                  <div class="col-md-6">
                    <input type="date" id="extendDate" class="form-control" name="extendDate" min=
                    <?php
                    echo date('Y-m-d', strtotime($dueP->recvdt. ' + 60 days')); 
                    if($dueP->extendtodt != null){
                      echo ' value=' . date('Y-m-d', strtotime($dueP->extendtodt));
                    }
                    ?>
                    >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="extendNumDate" class="col-md-4 col-form-label text-md-left">No. of Days: </label>
                  <div class="col-md-6">
                    <input type="number" id="extendNumDate" class="form-control" name="extendNumDate">
                  </div>
                </div>
                <div class="form-group"> 
                  <label class="col-form-label text-md-left">Extension Reason:</label>
                  <textarea class="form-control" rows="5" id="extendReason" name="extendReason" >{{ $dueP->extendrsn }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-success">Save</button>
              <input type="hidden" name="extendCase" value="">
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
    </div>
  </div>
  
  <!-- Link Case Modal -->
  @php
    $complaints = App\Complaint::all();    
  @endphp
  <div class="modal fade" id="linkModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
          
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Link Case</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <h6 class="col-form-label text-md-left">&nbspThis Due Process is already linked to:</h6>
                <table class="table table-hover"> 
                    <tbody>
                      @foreach ($dueP->complaints as $complaint)
                        @php
                          $disputeLinkID = App\Disputelnk::where('typeid',1)->where('mainid', $complaint->id)->where('secondid', $dueP->id)->first()->id;
                        @endphp
                        <tr>
                          <td>
                            <p>&bull; Complaint {{ $complaint->casenumber }}</p>
                          </td>
                          <td>
                            <a href="#" >
                              <button type="button" class="btn btn-primary btn-sm" name="view" data-toggle="tolltip" title="View Complaint"><i class="fa fa-eye"></i></button>
                            </a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $disputeLinkID }}').submit();">
                              <button type="button" class="btn btn-danger btn-sm" name="unlink" data-toggle="tolltip" title="Unlink Complaint"><i class="fa fa-unlink"></i></button>
                            </a>
                            <form action="{{ action('DisputeLinkController@destroy', ['disputeLinkID' => $disputeLinkID]) }}" method="POST" id="delete-form-{{ $disputeLinkID }}">
                              {{csrf_field()}}
                              {{ method_field('DELETE') }}
                            </form>
                          </td>
                        </tr>
                      @endforeach
                      <form id="saveLink" method="POST" action="{{ action('DisputeLinkController@store') }}">
                      @csrf
                      <tr>
                        <td>
                          <label for="caseType" class="col-form-label float-left">Please select Case's Type: </label>
                        </td>
                        <td>
                          <select class="form-control" id="caseType" name="caseType">
                            <option value="1" selected> Complaint </option>
                            <option value=""> Mediation </option>
                            <option value=""> FIEP </option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="caseNumber" class="col-form-label float-left">Case Number: </label>
                        </td>
                        <td>
                          <select id="caseNumber" class="form-control" name="caseNumber">
                          </select>
                        </td>
                      </tr>
                      <input type="hidden" value="{{ $dueP->id }}" name="dueprocess">
                      </form>
                    </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#" onclick="event.preventDefault(); document.getElementById('saveLink').submit();">
                <button type="button" class="btn btn-success">Link</button>
              </a> 
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          
        </div>
    </div>
  </div>
  
  <!-- Delete Due Process Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ action('DueProcessController@destroy', ['dueprocessID' => $dueP->id]) }}">
              @csrf
              @method('delete')
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Case</h5>
                  <button type="button" class="close" data-dismiss="modal">
                      <span>&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <h6 class="text-center">Are you sure you want to <font color="red">DELETE</font> this Due Process ( {{ $dueP->casenum }} )?</h6>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  
    <!--Warning Wrong Extension Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="warning_extension_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h4 style="text-align: center">Please select one of the following file types: docx, doc, pdf, xlsx, ppt, pptx</h4>
                    </div>
                </div>
                <div class="modal-footer2">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  
    <!--Warning Big File Size Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="warning_size_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h4 style="text-align: center">Please select file with size smaller than 25 MB</h4>
                    </div>
                </div>
                <div class="modal-footer2">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  
  <!--Warning Duplicated Name Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="warning_name_modal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <h4 style="text-align: center">File name already existed. Please select a different file name.</h4>
                  </div>
              </div>
              <div class="modal-footer2">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@endsection

@section('specificJS')
<script language="JavaScript" type="text/javascript">

var dueProcess = {!! json_encode($dueP) !!};
var complaints = {!! json_encode($complaints) !!};

$('#extendModal').on('shown.bs.modal', function() {
  var start = new Date(dueProcess.recvdt);
  start.setDate(start.getDate() + 60);
  if(dueProcess.extendtodt != null){
    var tempExtend = new Date(dueProcess.extendtodt);
    var extend = new Date( tempExtend.getTime() - tempExtend.getTimezoneOffset() * -60000 );
    var diff = DateDiff(extend, start);
    $("#extendNumDate").val(diff);
  }

  $('#extendDate').change(function() {
    var temp = new Date($(this).val());
    var end = new Date( temp.getTime() - temp.getTimezoneOffset() * -60000 );
    var dayAmounts = DateDiff(end, start);
    $("#extendNumDate").val(dayAmounts);
  });

  $("#extendNumDate").on("keypress", function(e){
    console.log('eh');
    if (e.which == 13) {
      e.preventDefault();
      var temp = new Date(start.getTime());
      temp.setDate( temp.getDate() + parseInt($(this).val(),10) );
      var day = ("0" + temp.getDate()).slice(-2);
      var month = ("0" + (temp.getMonth() + 1)).slice(-2);
      var toReturn = temp.getFullYear()+"-"+(month)+"-"+(day) ;
      $("#extendDate").val(toReturn);
    }
  });
});

$('#linkModal').on('shown.bs.modal', function() {
  var $dropdown = $("#caseNumber");
  $.each(complaints, function() {
    $dropdown.append($("<option />").val(this.id).text(this.casenumber));
  });

  $('#caseType').change(function() {
    $dropdown.empty();
    if($(this).val() == '1') {
      $.each(complaints, function() {
        $dropdown.append($("<option />").val(this.id).text(this.casenumber));
      });
    }
  });
});


//Adding and removing groups of fields dynamically
$(document).ready(function() {

  //check extension, file size, file name of upload file
  $('input[type=file]').change(function(e) {
    var files = {!!json_encode($files) !!};
    var fileNames = [];
    for (var i = 0; i < files.length; i++) {
        fileNames.push(files[i].filename);
    }
    var val = $(this).val().toLowerCase(),
        regex = new RegExp("(.*?)\.(docx|doc|pdf|xlsx|ppt|pptx)$"),
        size = (this.files[0].size) / Math.pow(1024, 2); //from bytes to MB
    if (!(regex.test(val))) {
        $(this).val('');
        $("#warning_extension_modal").modal();
    }else if (size > 25) {
        $(this).val('');
        $("#warning_size_modal").modal();
    }else if (fileNames.includes(e.target.files[0].name)) {
        $(this).val('');
        $("#warning_name_modal").modal();
    }
  });

//preventing submiting by pressing enter
// $(window).keydown(function(event){
//     if(event.keyCode == 13) {
//       event.preventDefault();
//       return false;
//     }
// });

  var officers = {!! json_encode($officers) !!};
  var indexAtt = {!! json_encode($noOfAttorney) !!};
  var indexComp = {!! json_encode($noOfComp) !!};
  var indexOrd= {!! json_encode($noOfOrders) !!};
            //group add limit
            var maxGroup = 20;
            var index = indexAtt;
            var complainant=indexComp;
            var order=indexOrd;
            var noAdd=1;
            var compAdd=1;
            var orderAdd=1;
            // console.log(index);
            // $("#attorneyNo").val(index);
            // $("#complainantNo").val(complainant);
            // $("#orderNo").val(order);
            //add more fields group
            $(".addMore").click(function() {
                if ($('body').find('.group').length < maxGroup) {
                    var fieldHTML = '<div class="tab-content group">' + '<label for="attorney_'+index+'">County Attorney: <select id="attorney_'+index+'" name="attorney_'+index+'">/@foreach($attorneys as $attorney)<option value="{{$attorney->id}}">{{$attorney->name}}</option>/@endforeach</select></label><input type="hidden" name="attorneyNoAdd" value="'+noAdd+'"/><input type="hidden" name="attorneyNo" value="'+index+'"/>' + $(".groupCopy").html() + '</div>';
                    $('body').find('.group:last').after(fieldHTML);
                    index++;noAdd++;
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }
            });
           
            //remove fields group
            $("body").on("click", ".remove", function() {   
                $(this).parents(".group").remove();
                index--;   
            });

            $(".addMore2").click(function() {
              if ($('body').find('.group2').length < maxGroup) {
                      var fieldHTML = '<div class="tab-content group2">'+'<h6><u class="blueLineTitle">COMPLAINANT INFORMATION</u> <label for="initiator"><input type="checkbox" id="initiator_'+complainant+'" name="initiator_'+complainant+'" class="option-input checkbox"/>Initiator</label></h6>';
          fieldHTML=fieldHTML+'<label for="complainantType">Complainant Type: <select id="complainantType_'+complainant+'" name="complainantType_'+complainant+'"><option value="Parent">Parent</option><option value="District">District</option><option value="Advocate">Advocate</option></select></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantFirstName"> First Name: <input type="text" id="complainantFirstName_'+complainant+'" name="complainantFirstName_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantLastName"> Last Name: <input type="text" id="complainantLastName_'+complainant+'" name="complainantLastName_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantStreet1"> Street 1: <input type="text" id="complainantStreet1_'+complainant+'" name="complainantStreet1_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantStreet2"> Street 2: <input type="text" id="complainantStreet2_'+complainant+'" name="complainantStreet2_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainanttCity"> City: <input type="text" id="complainanttCity_'+complainant+'" name="complainantCity_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantState"> State: <select id="complainantState_'+complainant+'" name="complainantState_'+complainant+'">/@foreach($states as $state)/@if($state->abbrevname == "WV") <option value="{{$state->abbrevname}}" selected>{{$state->abbrevname}}</option>  /@else<option value="{{$state->abbrevname}}">{{$state->abbrevname}}</option>  /@endif/@endforeach</select></label><br>';
          fieldHTML=fieldHTML+ '<label for="complainantZip"> Zip:<input type="text"  id="complainantZip_'+complainant+'" name="complainantZip_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantPhone"> Phone: <input type="text" id="complainantPhone_'+complainant+'" name="complainantPhone_'+complainant+'" maxlength="255"/></label><br>';
          fieldHTML=fieldHTML+'<label for="complainantCounsel"> Counsel: <input type="text" id="complainantCounsel_'+complainant+'" name="complainantCounsel_'+complainant+'" maxlength="255"/></label><br><input type="hidden" name="complainantNo" value="'+complainant+'"/><input type="hidden" name="compNoAdd" value="'+compAdd+'"/>'+ $(".groupCopy2").html() + '</div>';
                      $('body').find('.group2:last').after(fieldHTML);
                      complainant++;compAdd++;
                      
                  } else {
                      alert('Maximum ' + maxGroup + ' groups are allowed.');
                  }
               
            });

            //remove fields group
            $("body").on("click", ".remove2", function() {
                $(this).parents(".group2").remove();
                complainant--;
                
            });

            //add hearing orders
            $(".addMore3").click(function() {
              if ($('body').find('.group3').length < maxGroup) {
                      var fieldHTML = '<div class="tab-content group3">'+'<br><label for="hOrders"><u class="blueLineTitle">HEARING ORDER:</u></label><br><textarea id="hOrders_'+order+'" name="hOrders_'+order+'" class="hearingArea" maxlength="255" rows="5"></textarea><label for="dueDate">Due Date:<input type="date" id="dueDate_'+order+'" name="dueDate_'+order+'"/></label><label for="completedDate">Date Completed:<input type="date" id="completedDate_'+order+'" name="completedDate_'+order+'"/></label><input type="hidden" name="orderNo" value="'+order+'"/><input type="hidden" name="orderNoAdd" value="'+orderAdd+'"/>';
                      fieldHTML=fieldHTML+ $(".groupCopy3").html() + '</div>';
                      $('body').find('.group3:last').after(fieldHTML);
                      order++;
                      
                  } else {
                      alert('Maximum ' + maxGroup + ' groups are allowed.');
                  }
               
            });

            //remove fields group
            $("body").on("click", ".remove3", function() {
                $(this).parents(".group3").remove();
                order--;
                
            });
            //display current hearing officer
            $("#dropdownHearingOfficers").change(function () {
              
              officers.forEach(function(officer){
                var e = document.getElementById("dropdownHearingOfficers");
                var selectedId = e.options[e.selectedIndex].value;
                if(selectedId=="0")
                {
                  var field='Please select a Hearing Officer';
                  $("#currOff").html(field);
                }
                else if(officer.id == selectedId)
                {
                var htmlField=officer.name + '<br>'+officer.street1+'<br>'+officer.street2+'<br>'+officer.city+', '+officer.state+' '+officer.zipcode+'<br>'+officer.phone+'<br>'+officer.email;
                $("#currOff").html(htmlField);
                }
              })
                
            });

            //calculate the hearing begins (date received+30days)
            $("#dateReceived").change(function (){
              var dr = document.getElementById('dateReceived').value;
              var date = new Date(dr);
              var newdate = new Date(date);
              newdate.setDate(newdate.getDate() + 30);
              var dd = ("0"+ newdate.getDate()).slice(-2);
              var mm = ("0"+ (newdate.getMonth() + 1)).slice(-2);
              var y = newdate.getFullYear(); 
              var someFormattedDate = y + '-' + mm + '-' + dd;
              $("#hearingBegins").val(someFormattedDate);
             
            
            })

            //calculate the Appeal Rights = Decision Date +90 days
            $("#decisionDate").change(function (){
              var dd = document.getElementById('decisionDate').value;
              var date = new Date(dd);
              var newdate = new Date(date);
              newdate.setDate(newdate.getDate() + 90);
              var dd = ("0"+ newdate.getDate()).slice(-2);
              var mm = ("0"+ (newdate.getMonth() + 1)).slice(-2);
              var y = newdate.getFullYear(); 
              var someFormattedDate = y + '-' + mm + '-' + dd;
              var displayDate = mm + '/' +dd+'/'+y;
              var fieldHtml='<small id="appealRights">Appeal Rights (90 days): '+displayDate+'</small>';

              $("#appealRights").html(fieldHtml);
             
            
            })

            

            
});

function DateDiff(date1, date2) {
    date1.setHours(0);
    date1.setMinutes(0, 0, 0);
    date2.setHours(0);
    date2.setMinutes(0, 0, 0);
    var datediff = Math.abs(date1.getTime() - date2.getTime()); // difference 
    return parseInt(datediff / (24 * 60 * 60 * 1000), 10); //Convert values days and return value      
}
        //function to limit checkbox selection
        function KeepCount() {

        var NewCount = 0

        if (document.myForm.return.checked)
        {NewCount = NewCount + 1}

        if (document.myForm.change.checked)
        {NewCount = NewCount + 1}
        if (NewCount == 2)
        {
        alert('Pick Just One: Return Student to Current Placement OR Change in Placement Ordered')
        document.myForm; return false;
        }
        }
        
        //Function to calculate Costs
        function myCalculation(){
          var seaTotal = (2/3)*document.getElementById('dphProf').value;   // Get the Inputvalue and do your calculation 
          document.getElementById('seaTotal').value = seaTotal.toFixed(3);        // display the result of your calculation

          var leaTotal = (1/3)*document.getElementById('dphProf').value;   // Get the Inputvalue and do your calculation 
          document.getElementById('leaTotal').value = leaTotal.toFixed(3);        // display the result of your calculation

          var hearingTotal = +document.getElementById('dphProf').value + +document.getElementById('courtReport').value ;   // Get the Inputvalue and do your calculation 
          document.getElementById('hearingCost').value = hearingTotal.toFixed(3);       // display the result of your calculation

        }

        //Function to Print the costs
        function myPrint()
        {
          var fieldHtml='<br><br><label for="dphProf">DPH Prof. Costs<input type="number" id="dphProf" placeholder="0.00 " class="costBox" value="'+document.getElementById('dphProf').value+'" /></label>';
          fieldHtml=fieldHtml+'<label for="courtReport">Court Reporter Costs<input type="number" id="courtReport" placeholder="0.00 " class="costBox" value="'+document.getElementById('courtReport').value+'" /></label>';
          fieldHtml=fieldHtml+'<label for="dphTrav">DPH Trav. Costs<input type="number" id="dphTrav" placeholder="0.00 " class="costBox" readonly value="'+document.getElementById('dphTrav').value+'" /></label>';
          fieldHtml=fieldHtml+'<label for="dphExp">DPH Expenses<input type="number" id="ddphExp" placeholder="0.00 " class="costBox" readonly value="'+document.getElementById('ddphExp').value+'" /></label><br>';
          fieldHtml=fieldHtml+'<label for="seaTotal">SEA Total Costs<input type="text" id="seaTotal" class="costBoxCalc" readonly value="'+document.getElementById('seaTotal').value+'" /></label>';
          fieldHtml=fieldHtml+'<label for="leaTotal">LEA Total Costs<input type="text" id="leaTotal" class="costBoxCalc" readonly value="'+document.getElementById('leaTotal').value+'" /></label>';
          fieldHtml=fieldHtml+'<label for="hearingCost">Grand Total Hearing Costs<input type="text" id="hearingCost" class="costBoxHear" readonly value="'+document.getElementById('hearingCost').value+'" /></label>';
          
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = fieldHtml;

          window.print();

          document.body.innerHTML = originalContents;
        }
</script>
@endsection