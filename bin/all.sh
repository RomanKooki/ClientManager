#!/bin/bash
if [[ "$PWD" =~ bin ]]
then
  ./update.sh
  ./reset.sh
  ./cs.sh
else
  ./bin/update.sh
  ./bin/reset.sh
  ./bin/cs.sh
fi
