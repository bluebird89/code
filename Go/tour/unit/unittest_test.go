package main

import (
	"testing"

	"github.com/stretchr/testify/assert"
)

func TestRun(t *testing.T) {
	val := Sum(1, 2)
	assert.Equal(t, 3, val)
}

// go test
