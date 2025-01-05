<!--div class="row" style="display: none;">
	<div class="col-lg-12">

	<h3>Customer Verification</h3>
	<form method="POST" action="/dashboard" id="form-verification" class="form-verification">
		{{ csrf_field() }}
		<div class="form-group">
		    <label class="form-control-label sr-only" for="appendedInputButton">Search</label>
		    <div class="controls">
		        <div class="input-group">
		            <input name="verification" id="verification" class="form-control" size="16" type="text" placeholder="">		            
		            <span class="input-group-btn">
		                <button id="btn-search" class="btn btn-primary" type="submit">Verify</button>
		            </span>
		        </div>
		        <span id="error-verification"></span>
		    </div>
		</div>
	</form>

	</div>
</div-->

<div class="row">
	<div class="col-lg-12">

	<h3>Customer Verification</h3>
	<form method="POST" action="/dashboard" id="form-verification" class="form-verification">
		{{ csrf_field() }}
		<div class="form-group">
		    <label class="form-control-label sr-only" for="appendedInputButton">Search</label>
		    <div class="controls">
		        <div class="input-group">
		            <input name="pawn_ticket_no" id="pawn-ticket-no" class="form-control" size="16" type="text" placeholder="Pawn Ticket No.">
					<input name="redeem_no" id="redeem-no" class="form-control" size="16" type="text" placeholder="Redeem No.">
					<input name="last_name" id="last-name" class="form-control" size="16" type="text" placeholder="Last Name">
					<input name="first_name" id="first-name" class="form-control" size="16" type="text" placeholder="First Name">
					<!--input name="middle_name_or_initial" id="middle-name-or-initial" class="form-control" size="16" type="text" placeholder="Middle Name or Middle Initial"-->
					<input name="contact_number" id="contact-number" class="form-control" size="16" type="text" placeholder="Contact Number">
					<input name="valid_id" id="valid-id" class="form-control" size="16" type="text" placeholder="Valid ID">

		            <span class="input-group-btn">
		                <button id="btn-search" class="btn btn-primary" type="submit">Verify</button>
		                <button id="btn-search" class="btn btn-info" type="reset">Clear</button>
		            </span>
		        </div>
		        <span id="error-verification"></span>
		    </div>
		</div>
	</form>

	</div>
</div>