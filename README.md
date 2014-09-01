URL Sharing WordPress Plugin
============================

The URL Sharing Plugin adds a text field with the post URL at the end of your posts – a [qz.com](http://qz.com) like sharing approach. A button enables copying the URL to the user’s clipboard.

The plugin can be used as a more privacy-friendly alternative to sharing buttons or as an additional sharing-option.

I was inspired by [Dominik's post](http://do-s.de/Blogger-macht-es-euren-Lesern-leichter/) about readability and usability on blogs (in German) who uses the Quartz-like approach – something I wanted to have, too.


## Installation

Upload the files in your plugins directory. Then activate it. On the URL Sharing settings page in the WordPress backend you can change the following: 
* The label (text) in front of the URL
* The text on the copy-to-clipboard-button

## Change style

You can change the styling by adding your changes to stylesheet of the plugin. In the default version the css classes .url_share_label and .url_share_input don't have values, in order to align to your theme visually. 

## To-do List

The first version of URL Share plugin is very basic. Things that might be considered in the future:

* Enable font color change of the URL in backend
* Offer a PHP-Snippet to enable more flexible positioning
* 	- A button to automatically copy the URL to the user's clipboard (by using an existing JavaScript library)- (done in version 1.1)

## Versions
### 1.1
Button to copy URL to user’s clipboard by using [ZeroClipBoard](https://github.com/zeroclipboard/zeroclipboard)

### 1.0
Initial version: Input line with post URL
