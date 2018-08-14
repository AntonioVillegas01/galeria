var $tumbleC = $('.tumbleweed-wrapper'),
    $tumbleweed = $('.tumbleweed'),
    $shadow = $('.shadow'),
    tumble = new TimelineMax({repeat: -1}),
    move = new TimelineMax({repeat: -1, yoyo: false}),
    bounce = new TimelineMax({repeat: -1, repeatDelay: 1.5}),
    expand = new TimelineMax({repeat: -1, repeatDelay: 1.5});;

tumble.to($tumbleweed, 3, {rotation: 360, ease: Linear.easeNone});
move.to($tumbleC, 9, {left: "100%", ease: Linear.easeNone});
bounce.to($tumbleweed, 1.5, {y: -100}).to($tumbleweed, 1.5, {y: 0, ease: Bounce.easeOut});
expand.to($shadow, 1.5, {scale: 2, opacity: .3}).to($shadow, 1.5, {scale: 1, ease: Bounce.easeOut, opacity: .8});

function percentToPixel(_elem, _perc){
    return (_elem.parent().outerWidth()/100)* parseFloat(_perc);
}