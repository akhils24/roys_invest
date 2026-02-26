<h4>New Contact Form Submission</h4>
<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
@if ($contact->subject)
<p><strong>Subject:</strong> {{ $contact->subject }}</p>
@endif
<p><strong>Message:</strong></p>
<p>{{ $contact->message }}</p>