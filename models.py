from sqlalchemy import Column, BigInteger, Text

from .database import Base


class Key(Base):
    __tablename__ = "key"

    id = Column(BigInteger, primary_key=True, index=True)
    name = Column(Text(4096), index=True)
    value = Column(Text(4096))
