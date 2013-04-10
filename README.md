kaltura-moodle24
================

A Kaltura/Moodle 2.4 Integration

This project intends to update the Kaltura Video Package addon (f/k/a plugin) found at https://moodle.org/plugins/view.php?id=447 to work with Moodle 2.4. That addon project is maintained by Ainatte Inbal, Mike Churchward, and Akinsaya Delamarre

Moodle 2.4 dropped support for the YUI 2 library in favor of YUI 3.  However, to make the transition to YUI 3 easier, Moodle 2.4 supports the use of the YUI 2in3 library.  The present project utilizes the YUI 2in3 library to extend  Kaltura Video Package integration to Moodle 2.4.  It is not a rewrite of the Kaltura Video Package to remove YUI 2 code.

Development and initial testing is being conducted on a Moodle 2.4.1 and Kaltura 5 CE integration. Kaltura 5 CE does not provide screencapture functionality, so all screencapture code present in the Moodle 2.4 addon has been commented out.  In addition, Kaltura Webcam capture and upload functionality has not yet been tested.

Note that all modifications of and additions to the existing Moodle 2.3 Kaltura Vidoe Package addon code have been noted via specific commenting in the code.

Subject to the limitations stated above, the following is an overview of the state of the update as of March 16, 2013: 

	Kaltura Video Resource component - appears fully functional

	Kaltura Video Activity component - appears fully functional

	MyMedia component - appears fully functional

	Kaltura Repository upload - appears fully functional
	
	Kaltura video embedding via TinyMCE - appears fully functional
	
	Kaltura Webcam functionality - not yet fully tested, but basically functional
	
	Kaltura Video Presentation component - not yet updated
	
	Kaltura Screencapture - not yet updated

The code made availabe through this project is offered "As Is" without warranty either expressed or implied.  Use it at your own risk.  However, I hope you will find it helpful.

Doug Loomer

