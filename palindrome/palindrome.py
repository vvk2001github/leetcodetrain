def solution(x:int) -> bool:
	if(isinstance(x, int) != True):
		return False
	tmp = str(x)
	reverse_tmp = tmp[::-1]
	if(tmp == reverse_tmp):
		return True
	else:
		return False

print(solution(121))