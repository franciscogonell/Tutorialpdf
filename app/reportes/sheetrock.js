// Sheetrock.js 1.0 Example 1
// https://chriszarate.github.io/sheetrock/

// The most basic use case of Sheetrock simply fetches the an 
// entire worksheet and loads it into a <table>.

// Define spreadsheet URL.
var mySpreadsheet = 'https://docs.google.com/spreadsheets/d/1qT1LyvoAcb0HTsi2rHBltBVpUBumAUzT__rhMvrz5Rk/edit#gid=0';

// Load an entire worksheet.
$('#statistics').sheetrock({
  url: mySpreadsheet
});
