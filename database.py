from sqlalchemy import create_engine
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker
from sqlalchemy.pool import QueuePool

SQLALCHEMY_DATABASE_URL = "mysql+mysqlconnector://fx168168:robo5555@35.202.224.8/mydb"

engine = create_engine(SQLALCHEMY_DATABASE_URL, future=True, poolclass=QueuePool, pool_timeout=360, pool_recycle=360, pool_pre_ping=True)
SessionLocal = sessionmaker(bind=engine, future=True)

Base = declarative_base()
