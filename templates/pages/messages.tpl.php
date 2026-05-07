<h2>Messages</h2>
<p>Messages are shown in chronological order, newest first.</p>
<table>
    <tr>
        <th>Time</th>
        <th>Sender</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>
    <?php foreach($messages as $m) { ?>
        <tr>
            <td><?= htmlspecialchars($m['created_at']) ?></td>
            <td><?= htmlspecialchars($m['sender_name']) ?></td>
            <td><?= htmlspecialchars($m['sender_email']) ?></td>
            <td><?= htmlspecialchars($m['subject']) ?></td>
            <td><?= nl2br(htmlspecialchars($m['message'])) ?></td>
        </tr>
    <?php } ?>
</table>