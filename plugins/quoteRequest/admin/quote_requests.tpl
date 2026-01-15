<!-- Quote Requests Admin Template -->

{if $smarty.get.action == 'view' && $quote}
    <!-- Detay Görünümü -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Quote Request Details - #{$quote.ID}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td width="150"><strong>Date:</strong></td>
                            <td>{$quote.Date}</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                <span class="label label-{if $quote.Status == 'new'}warning{elseif $quote.Status == 'read'}info{elseif $quote.Status == 'replied'}success{else}default{/if}">
                                    {$quote.Status|ucfirst}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Listing:</strong></td>
                            <td>{$quote.Listing_Title}</td>
                        </tr>
                        <tr>
                            <td><strong>Seller:</strong></td>
                            <td>{$quote.Seller_Username}</td>
                        </tr>
                        <tr>
                            <td><strong>Requester:</strong></td>
                            <td>{$quote.Requester_Username|default:"Guest"}</td>
                        </tr>
                    </table>
                    
                    <h5>Contact Information:</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td width="150"><strong>Name:</strong></td>
                            <td>{$quote.Name}</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><a href="mailto:{$quote.Email}">{$quote.Email}</a></td>
                        </tr>
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td><a href="tel:{$quote.Phone}">{$quote.Phone}</a></td>
                        </tr>
                        <tr>
                            <td><strong>Position:</strong></td>
                            <td>{$quote.Position}</td>
                        </tr>
                    </table>
                    
                    <h5>Description:</h5>
                    <div class="well">
                        {$quote.Description|nl2br}
                    </div>
                    
                    {if $quote.File_name}
                    <h5>Attached File:</h5>
                    <p>
                        <a href="{$smarty.const.RL_FILES_URL}quote_requests/{$quote.File_name}" target="_blank" class="btn btn-default">
                            <i class="fa fa-download"></i> Download {$quote.File_name}
                        </a>
                    </p>
                    {/if}
                    
                    {if $quote.Reply_message}
                    <h5>Reply:</h5>
                    <div class="alert alert-info">
                        <strong>Reply Date:</strong> {$quote.Reply_date}<br>
                        <strong>Message:</strong><br>
                        {$quote.Reply_message|nl2br}
                    </div>
                    {/if}
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Actions</h4>
                </div>
                <div class="panel-body">
                    <a href="index.php?controller=quote_requests&action=reply&id={$quote.ID}" class="btn btn-primary btn-block">
                        <i class="fa fa-reply"></i> Reply
                    </a>
                    <a href="index.php?controller=quote_requests" class="btn btn-default btn-block">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <hr>
                    <button type="button" class="btn btn-danger btn-block" onclick="if(confirm('Are you sure?')) location.href='index.php?controller=quote_requests&action=delete&id={$quote.ID}'">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

{elseif $smarty.get.action == 'reply' && $quote}
    <!-- Cevap Formu -->
    <form method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Reply to Quote Request #{$quote.ID}</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status:</label>
                            <select name="status" class="form-control">
                                <option value="read" {if $quote.Status == 'read'}selected{/if}>Read</option>
                                <option value="replied" {if $quote.Status == 'replied'}selected{/if}>Replied</option>
                                <option value="closed" {if $quote.Status == 'closed'}selected{/if}>Closed</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Reply Message:</label>
                    <textarea name="reply_message" class="form-control" rows="5" required>{$quote.Reply_message}</textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-send"></i> Send Reply
                    </button>
                    <a href="index.php?controller=quote_requests&action=view&id={$quote.ID}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>

{else}
    <!-- Liste Görünümü -->
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="pull-left">Quote Requests ({$total_count})</h4>
            <div class="pull-right">
                <a href="index.php?controller=quote_requests&action=export" class="btn btn-success btn-sm">
                    <i class="fa fa-download"></i> Export Excel
                </a>
            </div>
        </div>
        
        <!-- Filtreler -->
        <div class="panel-body">
            <form method="get" class="form-inline">
                <input type="hidden" name="controller" value="quote_requests">
                
                <div class="form-group">
                    <label>Status:</label>
                    <select name="status" class="form-control input-sm">
                        <option value="">All Statuses</option>
                        {foreach from=$statuses key=key item=label}
                            <option value="{$key}" {if $smarty.get.status == $key}selected{/if}>{$label}</option>
                        {/foreach}
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="index.php?controller=quote_requests" class="btn btn-default btn-sm">Clear</a>
            </form>
        </div>
        
        {if $quotes}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Listing</th>
                        <th>Requester</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$quotes item=quote}
                    <tr>
                        <td>#{$quote.ID}</td>
                        <td>{$quote.Date|date_format:"%d.%m.%Y %H:%M"}</td>
                        <td>
                            {$quote.Listing_Title|truncate:30}
                            {if $quote.File_name}
                                <i class="fa fa-paperclip text-info" title="Has attachment"></i>
                            {/if}
                        </td>
                        <td>{$quote.Name}</td>
                        <td><a href="mailto:{$quote.Email}">{$quote.Email}</a></td>
                        <td><a href="tel:{$quote.Phone}">{$quote.Phone}</a></td>
                        <td>
                            <span class="label label-{if $quote.Status == 'new'}warning{elseif $quote.Status == 'read'}info{elseif $quote.Status == 'replied'}success{else}default{/if}">
                                {$quote.Status|ucfirst}
                            </span>
                        </td>
                        <td>
                            <a href="index.php?controller=quote_requests&action=view&id={$quote.ID}" class="btn btn-xs btn-primary" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="index.php?controller=quote_requests&action=reply&id={$quote.ID}" class="btn btn-xs btn-success" title="Reply">
                                <i class="fa fa-reply"></i>
                            </a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        
        <!-- Sayfalama -->
        {if $navigator}
        <div class="panel-footer">
            {include file='blocks/m_block_navigator.tpl'}
        </div>
        {/if}
        
        {else}
        <div class="panel-body text-center">
            <p>No quote requests found.</p>
        </div>
        {/if}
    </div>
{/if}

<style>
.label {
    font-size: 11px;
    padding: 3px 6px;
}
.table td {
    vertical-align: middle;
}
</style>