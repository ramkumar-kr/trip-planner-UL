All Timings are in 24 hour format
Only Some Trains such as Chennai Express, Pushpak Express(From Mumbai to Lucknow) and Kamkhya Ledo Intercity Express journey details are added to the database
Code has not been written to add a train journey to the database.
If the browser supports HTML5 input as date functionality, a pop up appears to select date and time. If not, a text field will be shown
The Procedure to add a train data to database is as follows
Add the stations/locations (if already not present) to the stations table
Add the train to the trains table with the required parameters
Complete the visit table by adding appropriate data for every station visited by the train
The days stored in the visit table are encoded as follows:
Each day of the week has a specific number associated with it.(numbers are powers of 2).
The numbers are specified in non-decreasing order starting from Monday till Sunday
Monday -> 1, Tuesday -> 2, Wednesday -> 4, Thursday -> 8, Friday ->16, Saturday -> 32, Sunday ->64
If a train runs on multiple days, just add the specific numbers of all the days.
For example, if a train runs on wednesday and saturday, the value will be 36

The main intention of using this is to minimize amount of time spent in fetching data from the database by performing few more computations.
Few improvements are possible in incorporating date and time of departure and arrival
