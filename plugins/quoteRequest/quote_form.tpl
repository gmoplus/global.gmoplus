<form id="quote-request-form" enctype="multipart/form-data">
    <input type="hidden" name="listing_id" value="{$listing_data.ID}">
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_name">{$lang.quote_request_name} *</label>
                <input type="text" class="form-control" id="quote_name" name="name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_email">{$lang.quote_request_email} *</label>
                <input type="email" class="form-control" id="quote_email" name="email" required>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_phone">{$lang.quote_request_phone} *</label>
                <input type="tel" class="form-control" id="quote_phone" name="phone" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_position">{$lang.quote_request_position} *</label>
                <input type="text" class="form-control" id="quote_position" name="position" required>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="quote_description">{$lang.quote_request_description} *</label>
        <textarea class="form-control" id="quote_description" name="description" rows="4" required></textarea>
    </div>
    
    <div class="form-group">
        <label for="quote_file">{$lang.quote_request_file}</label>
        <input type="file" class="form-control" id="quote_file" name="quote_file" accept=".pdf,.doc,.docx,.xls,.xlsx">
        <small class="form-text text-muted">
            Max size: {$quote_request_config.max_file_size}MB. 
            Allowed: {$quote_request_config.allowed_files}
        </small>
    </div>
    
    <div class="form-group text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">{$lang.quote_request_send}</button>
    </div>
</form>