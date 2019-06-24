var style = document.documentElement.appendChild(document.createElement("style")),
    rule = " run {\
    0%   {\
        -webkit-transform: translate3d(0, 0, 0); }\
        transform: translate3d(0, 0, 0); }\
    }\
    100% {\
        -webkit-transform: translate3d(0, " + your_value_here + "px, 0);\
        transform: translate3d(0, " + your_value_here + "px, 0);\
    }\
}";
if (CSSRule.KEYFRAMES_RULE) { // W3C
    style.sheet.insertRule("@keyframes" + rule, 0);
} else if (CSSRule.WEBKIT_KEYFRAMES_RULE) { // WebKit
    style.sheet.insertRule("@-webkit-keyframes" + rule, 0);
}
