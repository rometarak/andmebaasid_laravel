import pandas as pd
import sqlite3

file_path = 'export2020.csv'
weather_data = pd.read_csv(file_path)

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

for index, row in weather_data.iterrows():
    cursor.execute("INSERT OR REPLACE INTO weather_date (date) VALUES (?)", (row['date'],))
    
    cursor.execute("INSERT OR REPLACE INTO temperature (date, tavg, tmin, tmax) VALUES (?, ?, ?, ?)",
                   (row['date'], row['tavg'], row['tmin'], row['tmax']))

    cursor.execute("INSERT OR REPLACE INTO precipitation (date, prcp, snow) VALUES (?, ?, ?)",
                   (row['date'], row['prcp'], row['snow']))
    
    cursor.execute("INSERT OR REPLACE INTO wind (date, wdir, wspd, wpgt) VALUES (?, ?, ?, ?)",
                   (row['date'], row['wdir'], row['wspd'], row['wpgt']))
    
    cursor.execute("INSERT OR REPLACE INTO pressure (date, pres) VALUES (?, ?)",
                   (row['date'], row['pres']))
    
    cursor.execute("INSERT OR REPLACE INTO sunlight (date, tsun) VALUES (?, ?)",
                   (row['date'], row['tsun']))

conn.commit()
conn.close()
