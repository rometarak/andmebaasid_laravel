import pandas as pd
import sqlite3

# Load the CSV file into a pandas DataFrame
file_path = 'export2020.csv'  # Path to your CSV
weather_data = pd.read_csv(file_path)

# Connect to an SQLite database
conn = sqlite3.connect('weather_viljandi_updated.db', timeout=10)
cursor = conn.cursor()


cursor.execute('''
    CREATE TABLE IF NOT EXISTS weather_date (
        date TEXT PRIMARY KEY
    )
''')

cursor.execute('''
    CREATE TABLE IF NOT EXISTS temperature (
        date TEXT,
        tavg REAL,
        tmin REAL,
        tmax REAL,
        FOREIGN KEY (date) REFERENCES weather_date(date)
    )
''')

cursor.execute('''
    CREATE TABLE IF NOT EXISTS precipitation (
        date TEXT,
        prcp REAL,
        snow REAL,
        FOREIGN KEY (date) REFERENCES weather_date(date)
    )
''')

cursor.execute('''
    CREATE TABLE IF NOT EXISTS wind (
        date TEXT,
        wdir REAL,
        wspd REAL,
        wpgt REAL,
        FOREIGN KEY (date) REFERENCES weather_date(date)
    )
''')

cursor.execute('''
    CREATE TABLE IF NOT EXISTS pressure (
        date TEXT,
        pres REAL,
        FOREIGN KEY (date) REFERENCES weather_date(date)
    )
''')

cursor.execute('''
    CREATE TABLE IF NOT EXISTS sunlight (
        date TEXT,
        tsun REAL,
        FOREIGN KEY (date) REFERENCES weather_date(date)
    )
''')


# Insert data into separate tables
for index, row in weather_data.iterrows():
    # Insert date into the main weather table
    cursor.execute("INSERT OR REPLACE INTO weather_date (date) VALUES (?)", (row['date'],))
    
    # Insert temperature data
    cursor.execute("INSERT OR REPLACE INTO temperature (date, tavg, tmin, tmax) VALUES (?, ?, ?, ?)",
                   (row['date'], row['tavg'], row['tmin'], row['tmax']))
    
    # Insert precipitation data
    cursor.execute("INSERT OR REPLACE INTO precipitation (date, prcp, snow) VALUES (?, ?, ?)",
                   (row['date'], row['prcp'], row['snow']))
    
    # Insert wind data
    cursor.execute("INSERT OR REPLACE INTO wind (date, wdir, wspd, wpgt) VALUES (?, ?, ?, ?)",
                   (row['date'], row['wdir'], row['wspd'], row['wpgt']))
    
    # Insert pressure data
    cursor.execute("INSERT OR REPLACE INTO pressure (date, pres) VALUES (?, ?)",
                   (row['date'], row['pres']))
    
    # Insert sunlight data
    cursor.execute("INSERT OR REPLACE INTO sunlight (date, tsun) VALUES (?, ?)",
                   (row['date'], row['tsun']))

# Commit changes and close connection
conn.commit()
conn.close()

print("Data inserted successfully!")
