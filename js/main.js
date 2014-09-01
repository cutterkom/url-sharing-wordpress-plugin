var clientTarget = new ZeroClipboard( $("#target-to-copy"), {
    moviePath: "http://paulund.localhost/playground/demo/zeroclipboard-demo/zeroclipboard/ZeroClipboard.swf",
    debug: false
} );

clientTarget.on( "load", function(clientTarget)
{
    $('#flash-loaded').fadeIn();

    clientTarget.on( "complete", function(clientTarget, args) {
        clientTarget.setText( args.text );
        $('#target-to-copy-text').fadeIn();
    } );
} );