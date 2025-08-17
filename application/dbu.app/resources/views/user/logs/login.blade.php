

<h2>Your Login Activity</h2>

@if ($logs->isEmpty())
    <p>No activity logs found.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date & Time</th>
                <th>Action</th>
                <th>IP Address</th>
                <th>User Agent</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ Str::limit($log->user_agent, 80) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif