from sqlalchemy.orm import Session
from sqlalchemy import func

from . import models


def get_all_keys(db: Session):
    return db.query(models.Key).all()


def get_key_by_name(db: Session, name: str):
    return db.query(models.Key).filter(models.Key.name == func.binary(name)).scalar()


def create_key(db: Session, name: str, value: str):
    if get_key_by_name(db, name):
        return None
    db_key = models.Key(
        name=name,
        value=value
    )
    db.add(db_key)
    db.commit()
    db.refresh(db_key)
    return db_key.id
