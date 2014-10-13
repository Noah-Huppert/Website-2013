/**
 * @author noah
 * Carosel.js
 * A libary I ended up making while designing my blog
 * Has 5 frames that rotatate around
 * To use paste the html code in carosel.hmtl
 * must run caroselInit() when body loads
 */
var turnTableElement;
var turnTableElementLeftNum;
var turnTableElementRightNum;
var turnTableElementRightNumPre;
var turnTableElementCenter;
var turnTableElementLeft;
var turnTableElementRight;
var turnTableElementRightPre;
var tableMovedRecently = false;
var interval = 5000;

function caroselInit() {
	turnTableElement = 5;
	turnTableElementLeftNum = turnTableElement - 1;
	turnTableElementRightNum = turnTableElement + 1;
	turnTableElementRightNumPre = turnTableElementRightNum + 1;
	turnTableElementCenter = '#turnTableElement5'
	turnTableElementLeft = '#turnTableElement4';
	turnTableElementRight = '#turnTableElement1';
	turnTableElementRightPre = '#turnTableElement' + turnTableElementRightNumPre;
	$('.turnTableElement').hide();
	$(turnTableElementCenter).show();
	$(turnTableElementLeft).show();
	$(turnTableElementRight).show();

	$((":hidden" )).css({
		'left' : (($(window).width() - $('.turnTableElement').width()) / 2) - (2 * ($('.turnTableElement').width()) + 75)
	});
	$(turnTableElementCenter).animate({
		left : ($(window).width() - $('.turnTableElement').width()) / 2,
		opacity : '1'
	}, 0);
	$(turnTableElementLeft).animate({
		left : (($(window).width() - $('.turnTableElement').width()) / 2) - ($('.turnTableElement').width() + 75),
		opacity : '0.4'
	}, 0);
	$(turnTableElementRight).animate({
		left : (($(window).width() - $('.turnTableElement').width()) / 2) + ($('.turnTableElement').width() + 75),
		opacity : '0.4'
	}, 0);
	turnTableElement = turnTableElement - 1;
	checkTurnTableLimits();
	turnTableElementLeftNum = turnTableElement - 1;
	turnTableElementRightNum = turnTableElement + 1;
	checkTurnTableLimits();
	turnTableElementRightNumPre = turnTableElementRightNum + 1;

	//Turn Table Element Content
	$('.turnTableElementContent').css({
		'margin-top' : ($('.turnTableElement').height() - $('.turnTableElementContent').height()) / 3
	});

	//Turn Table Controll Arows
	$('#turnTableConrtollArrowLeft').css({
		'margin-top' : ($('#turnTable').height() - 120) / 2,
		'margin-left' : (($(window).width() - $('.turnTableElement').width()) / 2) - 65
	});
	$('#turnTableConrtollArrowRight').css({
		'margin-top' : ($('#turnTable').height() - 120) / 2,
		'margin-left' : (($(window).width() + $('.turnTableElement').width()) / 2)
	});
	$('#turnTableConrtollArrowLeft').bind('click', function(event) {
		iterateCarosel('back');
	});
	$('#turnTableConrtollArrowRight').bind('click', function(event) {
		iterateCarosel('forward');
	});
	$('.turnTableControllArrow').mouseout(function() {
		tableMovedRecently = false;
	});
	$('.turnTableControllArrow').mouseover(function() {
		tableMovedRecently = true;
	});
}

window.setInterval(function() {
	if (tableMovedRecently == false) {
		iterateCarosel('forward');
	}
}, interval);

function iterateCarosel(direction) {
	if (direction == 'back') {
		turnTableElement = turnTableElement + 1;
		checkTurnTableLimits();
		turnTableElementLeftNum = turnTableElement + 1;
		turnTableElementRightNum = turnTableElement - 1;
		checkTurnTableLimits();
		turnTableElementRightNumPre = turnTableElementRightNum - 1;
		checkTurnTableLimits();
		turnTableElementCenter = '#turnTableElement' + turnTableElement.toString();
		turnTableElementRight = '#turnTableElement' + turnTableElementLeftNum.toString();
		turnTableElementLeft = '#turnTableElement' + turnTableElementRightNum.toString();
		turnTableElementRightPre = '#turnTableElement' + turnTableElementRightNumPre.toString();

	}
	if (direction == 'forward') {
		turnTableElement = turnTableElement - 1;
		checkTurnTableLimits();
		turnTableElementLeftNum = turnTableElement - 1;
		turnTableElementRightNum = turnTableElement + 1;
		checkTurnTableLimits();
		turnTableElementRightNumPre = turnTableElementRightNum + 1;
		checkTurnTableLimits();
		turnTableElementCenter = '#turnTableElement' + turnTableElement.toString();
		turnTableElementLeft = '#turnTableElement' + turnTableElementLeftNum.toString();
		turnTableElementRight = '#turnTableElement' + turnTableElementRightNum.toString();
		turnTableElementRightPre = '#turnTableElement' + turnTableElementRightNumPre.toString();
	}

	$('.turnTableElement').hide();
	$(turnTableElementCenter).show();
	$(turnTableElementLeft).show();
	$(turnTableElementRight).show();
	$(turnTableElementRightPre).show();
	$((":hidden" )).css({
		'left' : (($(window).width() - $('.turnTableElement').width()) / 2) - (2 * ($('.turnTableElement').width()) + 75)
	});
	$(turnTableElementCenter).animate({
		left : ($(window).width() - $('.turnTableElement').width()) / 2,
		opacity : '1'
	}, 500);
	$(turnTableElementLeft).animate({
		left : (($(window).width() - $('.turnTableElement').width()) / 2) - ($('.turnTableElement').width() + 75),
		opacity : '0.4'
	}, 500);
	$(turnTableElementRightPre).animate({
		left : (($(window).width() - $('.turnTableElement').width()) / 2) + (2 * ($('.turnTableElement').width()) + 75),
		opacity : '0.4'
	}, 500);
	$(turnTableElementRight).animate({
		left : (($(window).width() - $('.turnTableElement').width()) / 2) + ($('.turnTableElement').width() + 75),
		opacity : '0.4'
	}, 500);

}

function checkTurnTableLimits() {
	switch(turnTableElement) {
		case 0:
			turnTableElement = 5;
		break;

		case 6:
			turnTableElement = 1;
		break;
	}
	switch(turnTableElementRightNumPre) {
		case 0:
			turnTableElementRightNumPre = 5;
		break;

		case 6:
			turnTableElementRightNumPre = 1;
		break;
	}
	switch(turnTableElementLeftNum) {
		case 0:
			turnTableElementLeftNum = 5;
		break;

		case 6:
			turnTableElementLeftNum = 1;
		break;
	}
	switch(turnTableElementRightNum) {
		case 0:
			turnTableElementRightNum = 5;
		break;

		case 6:
			turnTableElementRightNum = 1;
		break;
	}