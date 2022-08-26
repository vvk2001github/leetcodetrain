class Solution:
	def romanToInt(self, s: str) -> int:
		dct = {
			"I":1,
			"V":5,
			"X":10,
			"L":50,
			"C":100,
			"D":500,
			"M":1000,
			}
		res = 0

		for i, sym in enumerate(s):
			if not sym in dct:
				raise Exception('Not Roman')
		
		i = 0
		str_len = len(s)
		str_len_1 = str_len - 1
		while i < str_len:
			#print(dct[s[i]])
			#print(i)
			if((s[i] == 'I') and (i < str_len_1) and (s[i+1] == 'V')):
				res = res + 4
				i = i + 2
				continue
			if((s[i] == 'I') and (i < str_len_1) and (s[i+1] == 'X')):
				res = res + 9
				i = i + 2
				continue
			if((s[i] == 'X') and (i < str_len_1) and (s[i+1] == 'L')):
				res = res + 40
				i = i + 2
				continue
			if((s[i] == 'X') and (i < str_len_1) and (s[i+1] == 'C')):
				res = res + 90
				i = i + 2
				continue
			if((s[i] == 'C') and (i < str_len_1) and (s[i+1] == 'D')):
				res = res + 400
				i = i + 2
				continue
			if((s[i] == 'C') and (i < str_len_1) and (s[i+1] == 'M')):
				res = res + 900
				i = i + 2
				continue
			res = res + dct[s[i]]
			i = i + 1
		return res

if __name__=='__main__':
	sol = Solution()
	print(sol.romanToInt('LVIII'))