<h4>Profile details:</h4>

<ul class="nav nav-pills">
    <li role="presentation" class="active"><a data-toggle="pill" href="#member">Member</a></li>
    <li role="presentation"><a data-toggle="pill" href="#compliant">Compliant</a></li>
</ul>


<div class="tab-content">
    <div id="member" class="tab-pane fade in active">

        <table border="0" class="table table-striped table-bordered">
            <tr>
                <td>Initials:</td>
                <td>{!!$initials!!}</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>{!!$name!!}</td>
            </tr>
            <tr>
                <td>Surname: &nbsp;</td>
                <td>{!!$surname!!}</td>
            </tr>
            <tr>
                <td>Cellphone: &nbsp;</td>
                <td>{!!$cellphone!!}</td>
            </tr>
            <tr>
                <td>Email: &nbsp;</td>
                <td>{!!$email!!}</td>
            </tr>
            <tr>
                <td>ID: &nbsp;</td>
                <td>{!!$idno!!}</td>
            </tr>
            <tr>
                <td>Courier Address: &nbsp;</td>
                <td>{!!$courier!!}</td>
            </tr>
            <tr>
                <td>Courier Code: &nbsp;</td>
                <td>{!!$courier_code!!}</td>
            </tr>
            <tr>
                <td>FCA Status: &nbsp;</td>
                <td>{!!$member_category!!}</td>
            </tr>
            <tr>
                <td>Membership: &nbsp;</td>
                <td>{!!$member_membership!!}</td>
            </tr>
            <tr>
                <td>Date Renew: &nbsp;</td>
                <td>
                    <span @if(strtotime($date_paid) < strtotime('now') && $membership_id != 4 && $membership_id != 12) class="label label-danger" @endif>@if($membership_id == 4 || $membership_id == 12)
                            Life Member @else {!!$date_paid!!} @endif</span>
                </td>
            </tr>
            <tr>
                <td>Date Enrolled: &nbsp;</td>
                <td>{!!$date_enrolled!!}</td>
            </tr>
            <tr>
                <td>Date Updated: &nbsp;</td>
                <td>{!!$updated_at!!}</td>
            </tr>
            <tr>
                <td>Date Created: &nbsp;</td>
                <td>{!!$created_at!!}</td>
            </tr>
            <tr>
                <td>Confirm: &nbsp;</td>
                <td>@if($is_confirm == '1') <span class="label label-success">Yes</span> @else <span
                            class="label label-danger">No</span> @endif</td>
            </tr>
            <tr>
                <td>Active: &nbsp;</td>
                <td>@if($is_active == '1') <span class="label label-success">Active</span> @else <span
                            class="label label-danger">In-Active</span> @endif</td>
            </tr>
            <tr>
                <td>Archived: &nbsp;</td>
                <td>@if($is_archive == '1') <span class="label label-danger">Archived</span> @else <span
                            class="label label-success">Not Archived</span> @endif</td>
            </tr>
            <tr>
                <td>Payment: &nbsp;</td>
                <td>@if($is_paid == '1') <span class="label label-success">Received</span> @else <span
                            class="label label-danger">Outstanding</span> @endif</td>
            </tr>
            <tr>
                <td>Proof of Payment: &nbsp;</td>
                <td>@if(!empty($payment_proof))<a target="_blank"
                                                  href="{{config('filesystems.path')}}/user/proof/{!!$payment_proof!!}">Download</a>@else
                        none @endif</td>
            </tr>
            @if($show == 'notes')
                <tr>
                    <td colspan="2">@if(!empty($notes)){!!$notes!!} @else <i>No notes made</i> @endif</td>
                </tr>
            @endif
        </table>
    </div>
    <div id="compliant" class="tab-pane fade">
        <table border="0" class="table table-striped table-bordered">
            <tr>
                <td>Compliant :</td>
                <td>{!! ($compliancy_compliant) ? 'Yes' : 'No' !!}</td>
            </tr>
            <tr>
                <td>Compliant Paid:</td>
                <td>{!! ($compliancy_paid) ? 'Yes' : 'No'  !!}</td>
            </tr>
            <tr>
                <td>Compliant Permanent:</td>
                <td>{!! ($compliancy_permanent) ? 'Yes' : 'No'  !!}</td>
            </tr>
            <tr>
                <td>Compliant Activities:</td>
                <td>{!! $compliancy_activity !!}</td>
            </tr>
            <tr>
                <td>Compliant Non - Actives:</td>
                <td>{!! ($compliancy_non_active) !!}</td>
            </tr>
            <tr>
                <td>Compliant Enrolled:</td>
                <td>{!!$compliancy_enroled!!}</td>
            </tr>
        </table>
    </div>
</div>

<div>
    <a target="_blank" href="/admin/members/edit/{{$id}}" class="btn btn-default">Edit member</a>
</div>
